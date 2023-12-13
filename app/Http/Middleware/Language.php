<?php

namespace App\Http\Middleware;

use App\Helpers\Settings;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class Language
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->session()->has('applocale'))
        {
            $lang = Session::get('applocale');
            App::setLocale($lang);
        }
        else {
            App::setLocale(Settings::key('theme_language'));
        }
        return $next($request);;
    }
}
