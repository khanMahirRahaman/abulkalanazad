<?php

namespace App\Http\Middleware;

use App\Helpers\Socialmedias;
use App\Models\Socialmedia;
use Closure;

use App\Helpers\Settings;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class MaintenanceMode
{
    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $twitter = Socialmedias::twitter() ? Socialmedias::twitter()->name : Settings::key('site_name');

        if (Settings::key('maintenance') == 'y') {
            $image = (Settings::key('og_image'))
                ? asset('storage/images/' . Settings::key('og_image'))
                : asset('images/cover.png');

            SEOTools::setTitle('Maintenance Mode');
            SEOTools::setDescription(Settings::key('site_description'));
            SEOTools::metatags()->setKeywords(Settings::key('meta_keyword'));
            SEOTools::setCanonical(Settings::key('site_url'));

            SEOTools::opengraph()->setTitle(Settings::key('site_name'));
            SEOTools::opengraph()->setDescription(Settings::key('site_description'));
            SEOTools::opengraph()->setUrl(Settings::key('site_url'));
            SEOTools::opengraph()->setSiteName(Settings::key('company_name'));
            SEOTools::opengraph()->addImage($image);

            SEOTools::twitter()->setSite('@' . $twitter);
            SEOTools::twitter()->setTitle(Settings::key('site_name'));
            SEOTools::twitter()->setDescription(Settings::key('site_description'));
            SEOTools::twitter()->setUrl(Settings::key('site_url'));
            SEOTools::twitter()->setImage($image);

            SEOTools::jsonLd()->setTitle(Settings::key('site_name'));
            SEOTools::jsonLd()->setDescription(Settings::key('site_description'));
            SEOTools::jsonLd()->setType('WebPage');
            SEOTools::jsonLd()->setUrl(Settings::key('site_url'));
            SEOTools::jsonLd()->addImage($image);

            abort('503');
        }

        return $next($request);
    }
}
