<?php

namespace App\Helpers;

use ArrayAccess;
use App\Models\{Setting, Socialmedia};
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\{Cache, File};

class Settings
{
    public static function key($key)
    {
        static $settings;

        if(is_null($settings))
        {
            $settings = Cache::remember('settings', 24*60, function() {
                return array_pluck(Setting::all()->toArray(), 'value', 'key');
            });
        }

        return (is_array($key)) ? array_only($settings, $key) : $settings[$key];
    }

    /**
     * @param $dir
     * @return mixed
     */
    public static function get_theme($dir)
    {
        $content = File::get(public_path('themes/'.$dir.'/theme.json'));
        return json_decode($content, true);
    }

    /**
     * @param $arr
     * @return array|ArrayAccess|mixed
     */
    public static function theme_name($arr)
    {
        return Arr::get($arr, 'theme_name');
    }

    /**
     * @param $arr
     * @param $key
     * @return array|ArrayAccess|mixed
     */
    public static function get_data_theme($arr, $key)
    {
        return Arr::get($arr, $key);
    }

    /**
     * @param $page
     * @return string
     */
    public static function active_theme($page)
    {
        $theme_dir = Settings::key('current_theme_dir');
        return 'frontend.'.$theme_dir.'.'.$page;
    }

    /**
     * @param $path_asset
     * @return string
     */
    public static function theme($path_asset)
    {
        $theme_dir = self::key('current_theme_dir');
        return asset('themes/'.$theme_dir.'/'.$path_asset);
    }

    /**
     * @param $post
     * @return string
     */
    public static function linkPost($post)
    {
        if(self::key('permalink')) {
            $year  = $post->created_at->format('Y');
            $month = $post->created_at->format('m');
            $day   = $post->created_at->format('d');

            if(self::key('permalink') == "%year%/%month%/%day%"){
                return route('article.show', compact('post','year', 'month', 'day'));
            }elseif(self::key('permalink') == "%year%/%month%"){
                return route('article.show', compact('post','year', 'month'));
            }elseif(self::key('permalink') == "post_name"){
                return route('article.show', compact('post'));
            }else{
                return route('article.show', compact('post'));
            }
        }else{
            abort(404);
        }
    }

    /**
     * check_connection
     *
     * @return bool
     */
    public static function check_connection()
    {
        $connected = @fsockopen("www.google.com", 80);
        if ($connected){
            $is_conn = true;
            fclose($connected);
        } else {
            $is_conn = false;
        }
        return $is_conn;
    }

    /**
     * @return bool
     */
    public static function checkCredentialFileExists()
    {
        return File::exists(storage_path('app/analytics/service-account-credentials.json'));
    }

    /**
     * @param $id
     * @return mixed
     */
    public static function getSocMed($id)
    {
        return Socialmedia::find($id);
    }

    /**
     * @return bool
     */
    public static function siteLanguage()
    {
        $code = session('applocale') ? session('applocale') : Settings::get('theme_language');
        return Languages::name($code);
    }
}
