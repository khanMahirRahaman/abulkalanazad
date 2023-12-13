<?php

namespace App\Helpers;

use App\Models\Term;
use Illuminate\Support\Facades\Storage;

class Terms
{
    /**
     * @param $language
     * @param $slug
     * @return mixed
     */
    public static function getCategoryId($language, $slug)
    {
        return Term::select('id')
            ->category()->where('slug', $slug)
            ->where('language_id', $language)
            ->first()
            ->id;
    }

    /**
     * @param $language
     * @param $slug
     * @return mixed
     */
    public static function getTagId($language, $slug)
    {
        return Term::select('id')
            ->tag()->where('slug', $slug)
            ->where('language_id', $language)
            ->first()
            ->id;
    }

    /**
     * @param $filename
     * @return string
     */
    public static function getImage($filename)
    {
        if ($filename) {
            $exists = Storage::disk('public')
                ->exists('images/' . $filename);

            if ($exists) {
                return asset('storage/images/'. $filename);
            } else {
                return asset('img/noimage200.png');
            }
        } else {
            return asset('img/noimage200.png');
        }
    }
}
