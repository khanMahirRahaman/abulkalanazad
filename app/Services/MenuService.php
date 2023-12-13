<?php

namespace App\Services;

use App\Models\Term;
use App\Models\MenuItem;
use App\Helpers\Languages;
use App\Models\Socialmedia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class MenuService
{
    /**
     * @return array
     */
    public static function getMenuHeader()
    {
        return self::get(1);
    }
    
    /**
     * @return array
     */
    public static function getMenuFooter()
    {
        return self::get(2);
    }

    /**
     * @param $menu_id
     * @return array
     */
    public static function get($menu_id)
    {
        $menuItem  = new MenuItem;
        $language  = Languages::getIdFromLanguageCode(LaravelLocalization::getCurrentLocale());
        $menu_list = $menuItem->where("menu_id", $menu_id)->where('language', $language)->orderBy("sort")->get();
        $roots     = $menu_list->where('menu_id', $menu_id)->where('parent', 0)->where('language', $language);

        return self::tree($roots, $menu_list);
    }

    /**
     * @param $items
     * @param $all_items
     * @return array
     */
    private static function tree($items, $all_items)
    {
        $language = Languages::findId(LaravelLocalization::getCurrentLocale());
        $data_arr = array();
        $i = 0;
        foreach ($items as $item) {
            $data_arr[$i] = $item->toArray();
            $find = $all_items->where('parent', $item->id)->where('language', $language);

            $data_arr[$i]['child'] = array();

            if ($find->count()) {
                $data_arr[$i]['child'] = self::tree($find, $all_items);
            }

            $i++;
        }

        return $data_arr;
    }
}
