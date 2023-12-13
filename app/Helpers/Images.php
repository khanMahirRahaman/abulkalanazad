<?php

namespace App\Helpers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Images
{
    /**
     * @param $request_image
     * @return string
     */
    public static function fileName($request_image)
    {
        $getFileName = pathinfo($request_image->getClientOriginalName(), PATHINFO_FILENAME);
        $getFileExtension = pathinfo($request_image->getClientOriginalExtension(), PATHINFO_FILENAME);
        return $getFileName . '-' . Str::random(10) . '.' . $getFileExtension;
    }

    /**
     * @param $filename
     * @return mixed
     */
    public static function get_image($filename)
    {
        return route('gallery.show.image', $filename);
    }

    /**
     * @return mixed
     */
    public static function webLogoLight()
    {
        return Settings::key('logo_web_light')
        ?  route('logo.display', Settings::key('logo_web_light'))
        : asset('themes/magz/images/logo-light.png');
    }

    /**
     * @return mixed
     */
    public static function webLogoDark()
    {
        return Settings::key('logo_web_dark')
        ?  route('logo.display', Settings::key('logo_web_dark'))
        : asset('themes/magz/images/logo.png');
    }

    /**
     * @param $filename
     * @return string
     */
    public static function getImage($filename) {
        $file = public_path('img/noimage.png');
        $type = File::mimeType($file);

        if ($filename) {
            $exists = Storage::disk('public')->exists('images/' . $filename);
            if ($exists) {
                $file = Storage::get('public/images/' . $filename);
                $type = Storage::disk('public')->mimeType('images/' . $filename);
            }
        }

        return 'data:' . $type . ';base64,' . base64_encode($file);
    }
}
