<?php

namespace App\Helpers;

use ArrayAccess;
use App\Models\{Setting, Socialmedia};
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\{Cache, DB, File};

class Site
{
    /**
     * @return mixed
     */
    public static function latestNews() {
        return Posts::query()->latest();
    }
}
