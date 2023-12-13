<?php

namespace App\Http\Controllers\Front;

use App\Models\Post;
use App\Models\Term;
use Hashids\Hashids;
use App\Helpers\Posts;
use App\Helpers\Languages;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Artesaos\SEOTools\Facades\SEOTools;
use App\Helpers\{Settings, Socialmedias};
use Illuminate\Contracts\Foundation\Application;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Carbon\Carbon;

class DatedController extends Controller
{
    /**
     * @param Term $term
     * @return Application|Factory|\Illuminate\Contracts\View\View
     */
    public function __invoke($dated)
    {
        $getCurrentLocale= LaravelLocalization::getCurrentLocale() ? LaravelLocalization::getCurrentLocale() : Settings::key('theme_language');
        $id = Languages::getIdFromLanguageCode($getCurrentLocale);
        $paginate_posts = Posts::query()->whereMonth('created_at', date('m', strtotime($dated)))->whereDay('created_at', date('d', strtotime($dated)))->orderBy("created_at", "ASC")->paginate(10);
        $hashids = new Hashids();
        $latestNews = Posts::query()->latest()->limit(4)->get();

        $image = (Settings::key('og_image')) ? route('ogi.display', Settings::key('og_image')) :
            asset('img/cover.png');


        SEOTools::setTitle( Posts::dateConverter(date('d F', strtotime($dated))). ' এর সকল পোস্ট');
        SEOTools::setDescription(Settings::key('site_description'));
        SEOTools::metatags()->setKeywords(Settings::key('meta_keyword'));
        SEOTools::setCanonical(Settings::key('site_url') . '/news/popular');

        SEOTools::opengraph()->setDescription(Settings::key('site_description'));
        SEOTools::opengraph()->setUrl(Settings::key('site_url') . '/news/popular');
        SEOTools::opengraph()->setSiteName(Settings::key('company_name'));
        SEOTools::opengraph()->addImage($image);


        SEOTools::jsonLd()->setDescription(Settings::key('site_description'));
        SEOTools::jsonLd()->setType('WebPage');
        SEOTools::jsonLd()->setUrl(Settings::key('site_url') . '/news/popular');
        SEOTools::jsonLd()->addImage($image);
        return view(Settings::active_theme('page/dated'), compact(
             'dated','paginate_posts', 'hashids', 'latestNews'
        ));
    }
}
