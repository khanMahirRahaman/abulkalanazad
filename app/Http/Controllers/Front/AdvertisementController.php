<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class AdvertisementController extends Controller
{
    /**
     * @param $filename
     * @return string
     */
    public function displayAdImage($filename): string
    {
        if(Storage::disk('public')->exists('ad/' . $filename)){
            return Storage::disk('public')->response('ad/' . $filename);
        } else {
            return __('theme_magz.no_display ');
        }
    }
}
