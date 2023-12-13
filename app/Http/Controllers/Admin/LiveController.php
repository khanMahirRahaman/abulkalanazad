<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Live;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LiveController extends Controller
{
    public function index()
    {
        $lives = Live::orderBy('id', 'desc')->get();

        return view('admin.live.index', compact('lives'));
    }

    public function create()
    {
        return view('admin.live._create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            "link" => "required",
            "title"=>"required"
        ]);

        $live = new Live();

        $live->title = $request->title;
        $live->link = $request->link;
        $live->save();

        return redirect()->route('live.index')->withSuccess(__('notification.saved_successfully'));
    }

    public function edit($live_id)
    {
        $live = live::where('id', $live_id)->first();

        return view('admin.live.edit', compact('live'));
    }

    public function update(Request $request, $live_id)
    {
        $this->validate($request, [
            "title" => "required",
            "link" => "required"
        ]);

        $live = live::findOrFail($live_id);


        $live->title = $request->title;
        $live->link = $request->link;

        $live->save();

        return redirect()->route('live.index')->withSuccess(__('notification.updated_successfully'));
    }

    public function delete($live_id)
    {
        try {
            $live = live::findOrFail($live_id);
            $live->delete();

            return redirect()->route('live.index')->withSuccess(__('notification.deleted_successfully'));
        } catch (\Exception $exception) {
            return redirect()->route('live.index')->withError(__('notification.deleted_not_successfully'));
        }
    }
}
