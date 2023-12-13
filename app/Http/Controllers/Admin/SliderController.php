<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::orderBy('id', 'desc')->get();

        return view('admin.slider.index', compact('sliders'));
    }

    public function create()
    {
        return view('admin.slider._create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            "headline"=> "required",
            "image" => "required",
            "link"=>"required"
        ]);

        $slider = new Slider();

        $image = $request->file('image');
        $slider->headline = $request->headline;
        $slider->link = $request->link;

        if ($image) {

            $path = 'uploads/slider';
            $fixedWidth = 1500;
            $fixedHeight = 545;
            $img = Image::make($image);
            $originalAspectRatio = $img->width() / $img->height();
            $fixedAspectRatio = $fixedWidth / $fixedHeight;
            if ($originalAspectRatio > $fixedAspectRatio) {
                $newWidth = $fixedWidth;
                $newHeight = $newWidth / $originalAspectRatio;
            } else {
                $newHeight = $fixedHeight;
                $newWidth = $newHeight * $originalAspectRatio;
            }

            $img->resize($newWidth, $newHeight);
            $canvas = Image::canvas($fixedWidth, $fixedHeight, '#adadad');
            $x = round(($fixedWidth - $newWidth) / 2);
            $y = round(($fixedHeight - $newHeight) / 2);
            $canvas->insert($img, 'top-left', $x, $y);
            $fileName = Str::random(10) . '.webp';
            $canvas->save($path . '/' . $fileName, 100, 'webp');
            $slider->image = $fileName;




        } else {
            $slider->image = 'null';
        }

        $slider->save();

        return redirect()->route('slider.index')->withSuccess(__('notification.saved_successfully'));
    }

    public function edit($slider_id)
    {
        $slider = Slider::where('id', $slider_id)->first();
        return view('admin.slider.edit', compact('slider'));
    }

    public function update(Request $request, $slider_id)
    {
        $this->validate($request, [
            "headline"=>"required",
            "link"=>"required"
        ]);

        $slider = Slider::findOrFail($slider_id);
        $image = $request->file('image');

        if ($image) {
            $path = 'uploads/slider';
            $fixedWidth = 1500;
            $fixedHeight = 545;
            $img = Image::make($image);
            $originalAspectRatio = $img->width() / $img->height();
            $fixedAspectRatio = $fixedWidth / $fixedHeight;
            if ($originalAspectRatio > $fixedAspectRatio) {
                $newWidth = $fixedWidth;
                $newHeight = $newWidth / $originalAspectRatio;
            } else {
                $newHeight = $fixedHeight;
                $newWidth = $newHeight * $originalAspectRatio;
            }

            $img->resize($newWidth, $newHeight);
            $canvas = Image::canvas($fixedWidth, $fixedHeight, '#adadad');
            $x = round(($fixedWidth - $newWidth) / 2);
            $y = round(($fixedHeight - $newHeight) / 2);
            $canvas->insert($img, 'top-left', $x, $y);
            $fileName = Str::random(10) . '.webp';
            $canvas->save($path . '/' . $fileName, 100, 'webp');
            $slider->image = $fileName;
        } else {
            $slider->image = $slider->image;
        }

        $slider->link = $request->link;
        $slider->headline = $request->headline;
        $slider->save();

        return redirect()->route('slider.index')->withSuccess(__('notification.updated_successfully'));
    }

    public function delete($slider_id)
    {
        try {
            $slider = Slider::findOrFail($slider_id);

            if (!is_null($slider->image)) {
                if (file_exists('/uploads/slider' . $slider->image) and !empty($slider->image)) {
                    unlink('/uploads/slider' . $slider->image);
                }
            }

            $slider->delete();

            return redirect()->route('slider.index')->withSuccess(__('notification.deleted_successfully'));
        } catch (\Exception $exception) {
            return redirect()->route('video.index')->withError(__('notification.deleted_not_successfully'));
        }
    }
}
