<?php 

namespace App\Services;

use App\Models\Setting;
use Illuminate\Support\Facades\Cache;

class SettingService
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
}