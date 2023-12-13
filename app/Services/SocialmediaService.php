<?php

namespace App\Services;

use App\Models\Term;
use App\Models\Socialmedia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;

class SocialmediaService
{
    /**
     * @return Builder[]|Collection
     */
    public static function getSite()
    {
        return Socialmedia::with('site')->has('site');
    }
}
