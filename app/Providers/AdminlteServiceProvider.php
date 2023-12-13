<?php

namespace App\Providers;

use App\Helpers\Settings;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AdminlteServiceProvider extends ServiceProvider
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
            if (Settings::key('favicon')) {
                config(['adminlte.use_full_favicon' => false]);
                config(['adminlte.use_custom_favicon' => true]);
                config(['adminlte.path_favicon' => url('icon/' . Settings::key('favicon'))
                ]);
            }
            config(['adminlte.logo' => '<b>' . Settings::key('company_name') . '</b>']);
            if (Settings::key('logo_dashboard')) {
                config(['adminlte.logo_img' => url('dashboard/logo/' . Settings::key('logo_dashboard'))]);
            } else {
                config(['adminlte.logo_img' => 'img/logo.png']);
            }
            if (Settings::key('logo_auth')) {
                config(['adminlte.logo_img_auth' => url('auth/logo/' . Settings::key('logo_auth'))]);
            } else {
                config(['adminlte.logo_img_auth' => 'img/logo-auth.png']);
            }
        }
    }
}
