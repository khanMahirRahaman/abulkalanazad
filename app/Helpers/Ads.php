<?php

namespace App\Helpers;

use App\Models\{AdPlacement, Advertisement, GoogleAdsense};
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Ads
{
    /**
    * @param $placement_name
    * @return mixed
    */
    public static function checkAd($placement_name) {
        return AdPlacement::with('ad')->whereSlug($placement_name)->first()->ad()->exists();
    }

    /**
     * @param $placement_name
     * @return bool
     */
    public static function checkFileAd($placement_name) {
        $filename = AdPlacement::with('ad')->whereSlug($placement_name)->first()->ad->first()->image;
        return Storage::disk('public')->exists('ad/' . $filename);
    }

    /**
     * @param $name
     * @return mixed
     */
    public static function checkAdPlacementActive($name) {
        return AdPlacement::with('ad')->whereSlug($name)->whereActive('y')->exists();
    }

    /**
     * @param $name
     * @return mixed
     */
    public static function checkAdActive($name) {
        return Advertisement::whereName($name)->whereActive('y')->exists();
    }

    /**
     * @param $placement_name
     * @return string
     */
    public static function url($placement_name) {
        if ( self::checkAd($placement_name) ) {
            $adPlace = AdPlacement::with('ad')->whereSlug($placement_name);
            if ($adPlace->first()->ad()->exists()) {
                return $adPlace->first()->ad->first()->url;
            } else {
                return '#';
            }
        }
        return '#';
    }

    /**
     * @param $placement_name
     * @return string
     */
    public static function image($placement_name) {
        $image = '';
        if ( self::checkAd($placement_name) ) {
            $image = AdPlacement::with('ad')->whereSlug($placement_name)->first()->ad->first()->image;
        }
        return route('ad.image', $image);
    }

    /**
     * @param $placement_name
     * @return string|null
     */
    public static function type($placement_name) {
        return AdPlacement::with('ad')->whereSlug($placement_name)->first()->ad->first()->type;
    }

    /**
     * @param $placement_name
     * @return string
     */
    public static function checkFileScript($placement_name) {
        $name = null;
        if ( self::checkAd($placement_name) ) {
            $name = AdPlacement::with('ad')->whereSlug($placement_name)->first()->ad->first()->name;
        }
        return Str::slug($name) .'-script.blade.php';
    }

    /**
     * @param $placement_name
     * @return string
     */
    public static function checkFileGa($placement_name) {
        $name = null;
        if ( self::checkAd($placement_name) ) {
            $name = AdPlacement::with('ad')->whereSlug($placement_name)->first()->ad->first()->name;
        }
        return Str::slug($name) .'-ga.blade.php';
    }

    /**
     * @param $placement_name
     * @return string
     */
    public static function viewFileScript($placement_name) {
        $name = null;
        if ( self::checkAd($placement_name) ) {
            $name = AdPlacement::with('ad')->whereSlug($placement_name)->first()->ad->first()->name;
        }
        return Str::slug($name) .'-script';
    }

    /**
     * @param $placement_name
     * @return string
     */
    public static function viewFileGa($placement_name) {
        $name = null;
        if ( self::checkAd($placement_name) ) {
            $name = AdPlacement::with('ad')->whereSlug($placement_name)->first()->ad->first()->name;
        }
        return Str::slug($name) .'-ga';
    }

    /**
     * @param $name
     * @return mixed
     */
    public static function dataGa($name) {
        $id = AdPlacement::with('ad')->where('slug', $name)->first()->id;
        $slot = AdPlacement::with('ad')->find($id)->ad->first()->ga;
        return GoogleAdsense::where('ad_slot', $slot)->first();
    }
}
