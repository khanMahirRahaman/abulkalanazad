<?php

namespace App\View\Composers;

use App\Helpers\Languages;
use App\Helpers\Settings;
use Illuminate\View\View;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class SiteComposer
{
    /**
     * Bind data to the view.
     *
     * @param View $view
     * @return void
     */
    public function compose(View $view)
    {
        $getCurrentLocale= LaravelLocalization::getCurrentLocale() ? LaravelLocalization::getCurrentLocale() : Settings::key('theme_language');
        $id = Languages::getIdFromLanguageCode($getCurrentLocale);

    }
}
