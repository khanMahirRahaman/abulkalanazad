<?php

namespace App\Helpers;

use App\Models\Socialmedia;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class Socialmedias
{
    /**
     * @return Builder[]|Collection
     */
    public static function site()
    {
        return Socialmedia::with('site')->has('site')->get();
    }

    /**
     * @return mixed
     */
    public static function twitter()
    {
        $query = Socialmedia::has('site')->firstWhere('slug', 'twitter');
        if($query){
            return $query->site->name;
        }
        return null;
    }
}
