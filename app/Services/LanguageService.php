<?php 

namespace App\Services;

use App\Models\Language;

class LanguageService
{
    /**
     * @return mixed
     */
    public static function activeCount()
    {
        return Language::query()->active()->count();
    }

    /**
     * @return mixed
     */
    public static function showDropdown()
    {
        return Language::query()->active()->get();
    }
}