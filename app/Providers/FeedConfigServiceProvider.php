<?php

namespace App\Providers;

use App\Helpers\Settings;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class FeedConfigServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        if (Schema::hasTable('settings')) {
            if (Settings::key('site_name')) {
                config(['feed.feeds.main.title' => Settings::key('site_name')]);
                config(['feed.feeds.main.description' => __('Recent content on') . ' ' . Settings::key('site_name') .'.']);
            }
        }
    }
}
