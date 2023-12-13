<?php

namespace App\Helpers;

use App\Models\MenuItem;
use App\Models\Submenu;
use JeroenNoten\LaravelAdminLte\Events\ReadingDarkModePreference;
use JeroenNoten\LaravelAdminLte\Http\Controllers\DarkModeController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class Appearance
{
    /**
     * @return array
     */
    public static function getMenu($menu)
    {
        return self::get($menu);
    }

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
     * @return null
     */
    public static function language()
    {
        return Settings::key('display_language');
    }

    /**
     * @return string
     */
    public static function makeNavClasses()
    {
        $classes = [];
        $darkModeCtrl = new DarkModeController();
        event(new ReadingDarkModePreference($darkModeCtrl));

        if ($darkModeCtrl->isEnabled()) {
            $classes[] = 'navbar-black navbar-dark';
        } else {
            $classes[] = 'navbar-white navbar-light';
        }

        return trim(implode(' ', $classes));
    }

    /**
     * @return bool
     */
    public static function isDarkModeDashboard()
    {
        $darkModeCtrl = new DarkModeController();

        event(new ReadingDarkModePreference($darkModeCtrl));

        if ($darkModeCtrl->isEnabled()) {
            return true;
        }

        return false;
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

    /**
     * @param $menu
     * @return string
     */
    public static function getChild($menu)
    {
        $html = '<ul class="dropdown-menu">';
        foreach( $menu as $child ) {

            $class = $child['child'] ? 'dropdown magz-dropdown' : '';
            $icon = ($child['child']) ? '<i class="ion-ios-arrow-right"></i>' : '';
            $html .= '<li class="'.$class.'">';
            $html .= '<a href="'.$child['link'].'" title="">'.$child['label'] .' '.$icon.'</a>';
            // dd($child);
            if($child['child']) {
            echo 'yes';
                self::getChild($child['child']);
            }

            $html .= '</li>';
        }
        $html .= '</ul>';

        return $html;
    }

}

