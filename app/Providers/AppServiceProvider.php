<?php

namespace App\Providers;

use App\Helpers\Settings;
use App\View\Components\Admin\Breadcrumbs;
// use ConsoleTVs\Charts\Registrar as Charts;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        Blade::component('breadcrumbs', Breadcrumbs::class);

      //  Model::preventLazyLoading(! $this->app->isProduction());

//        $charts->register([
//            \App\Charts\GoogleAnalyticChart::class,
//            \App\Charts\DeviceChart::class
//        ]);
//        $this->loadViewsFrom(storage_path('app/public/ad'), 'ad');

        $settingsTableExists = Schema::hasTable('settings');

        if ($settingsTableExists) {
            $theme_language = Settings::key('theme_language');
            if ($theme_language) {
                Config::set([
                    'app.locale' => 'en'
                ]);
            }
        }
        if($this->app->environment('production')) {
            resolve(\Illuminate\Routing\UrlGenerator::class)->forceScheme('http');
        }
    }
}
