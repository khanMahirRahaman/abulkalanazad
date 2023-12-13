<?php

namespace App\Http\Middleware;

use App\Helpers\Settings;
use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class FrontendLocale
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return Response|RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $getCurrentLocale= LaravelLocalization::getCurrentLocale() ? LaravelLocalization::getCurrentLocale() : Settings::key('theme_language');
        App::setLocale($getCurrentLocale);
        return $next($request);
    }
}
