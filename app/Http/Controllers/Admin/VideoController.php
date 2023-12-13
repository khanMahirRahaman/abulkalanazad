<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class VideoController extends Controller
{
    public function index()
    {
        $videos = Video::orderBy('id', 'desc')->get();

        return view('admin.video.index', compact('videos'));
    }

    public function create()
    {
        return view('admin.video._create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            "video_url" => "required"
        ]);

        $video = new Video();

        $thumnail = $request->file('thumnail');

        if ($thumnail) {
            // dd($thumnail);
            $imgName = md5(Str::random(30) . time() . '_' . $request->file('thumnail')) . '.' . $request->file('thumnail')->getClientOriginalExtension();
            $request->file('thumnail')->move('uploads/video/', $imgName);
            $video->thumnail = $imgName;
        } else {
            $video->thumnail = 'section-one.jpg';
        }

        $video->url = $request->video_url;
        $video->save();

        return redirect()->route('video.index')->withSuccess(__('notification.saved_successfully'));
    }

    public function edit($video_id)
    {
        $video = Video::where('id', $video_id)->first();

        return view('admin.video.edit', compact('video'));
    }

    public function update(Request $request, $video_id)
    {
        $this->validate($request, [
            "video_url" => "required"
        ]);

        $video = Video::findOrFail($video_id);

        $thumnail = $request->file('thumnail');

        if ($thumnail) {
            $imgName = md5(Str::random(30) . time() . '_' . $request->file('thumnail')) . '.' . $request->file('thumnail')->getClientOriginalExtension();
            $request->file('thumnail')->move('uploads/video/', $imgName);
            if (file_exists('uploads/video/' . $video->thumnail) and !empty($video->thumnail)) {
                unlink('uploads/video/' . $video->thumnail);
            }
            $video->thumnail = $imgName;
        } else {
            $video->thumnail = $video->thumnail;
        }

        $video->url = $request->video_url;

        $video->save();

        return redirect()->route('video.index')->withSuccess(__('notification.updated_successfully'));
    }

    public function delete($video_id)
    {
        try {
            $video = Video::findOrFail($video_id);

            if (!is_null($video->thumnail)) {
                if (file_exists('uploads/video/' . $video->thumnail) and !empty($video->thumnail)) {
                    unlink('uploads/video/' . $video->thumnail);
                }
            }

            $video->delete();

            return redirect()->route('video.index')->withSuccess(__('notification.deleted_successfully'));
        } catch (\Exception $exception) {
            return redirect()->route('video.index')->withError(__('notification.deleted_not_successfully'));
        }
    }
}
