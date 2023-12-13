<?php

namespace App\Http\Controllers\Front;

use App\Models\Term;
use Hashids\Hashids;
use App\Helpers\Posts;
use App\Helpers\Languages;
use Illuminate\Support\Str;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;

use Artesaos\SEOTools\Facades\SEOTools;
use App\Helpers\{Settings, Socialmedias};
use Illuminate\Contracts\Foundation\Application;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(Term $tag)
    {
        $getCurrentLocale= LaravelLocalization::getCurrentLocale() ? LaravelLocalization::getCurrentLocale() : Settings::key('theme_language');
        $id = Languages::getIdFromLanguageCode($getCurrentLocale);
        
        $term = $tag;
        $term->load('posts');

        $description = $term->description ? Str::limit(strip_tags($term->description), 160) : '';

        $paginate_posts = $term->posts()->where('post_language', $id)->paginate(8);

        $hashids = new Hashids();

        $image = Settings::key('og_image') ? route('ogi.display', Settings::key('og_image')) :
            asset('img/cover.png');

        if (LaravelLocalization::getCurrentLocaleDirection() == 'rtl') {
            $title = $term->name . " :" . __('theme_magz.tag') . " - " . Settings::key('site_name');
        } else {
            $title = Settings::key('site_name') . " - " . __('theme_magz.tag') . ": " . $term->name;
        }

        $twitter = Socialmedias::twitter() ?: Settings::key('site_name');

        $latestNews = Posts::query()->latest()->limit(4)->get();

        SEOTools::setTitle($title);
        SEOTools::setDescription($description);
        SEOTools::metatags()->setKeywords(Settings::key('meta_keyword'));
        SEOTools::setCanonical(Settings::key('site_url'));

        SEOTools::opengraph()->setTitle($title);
        SEOTools::opengraph()->setDescription($description);
        SEOTools::opengraph()->setUrl(Settings::key('site_url'));
        SEOTools::opengraph()->setSiteName(Settings::key('company_name'));
        SEOTools::opengraph()->addImage($image);

        SEOTools::twitter()->setType('summary_large_image');
        SEOTools::twitter()->setSite('@' . $twitter);
        SEOTools::twitter()->setTitle($title);
        SEOTools::twitter()->setDescription($description);
        SEOTools::twitter()->setImage($image);

        SEOTools::jsonLd()->setTitle($title);
        SEOTools::jsonLd()->setDescription($description);
        SEOTools::jsonLd()->setType('WebPage');
        SEOTools::jsonLd()->setUrl(Settings::key('site_url'));
        SEOTools::jsonLd()->addImage($image);

        return view(Settings::active_theme('page/tag'), compact(
            'term', 'paginate_posts', 'hashids', 'latestNews'
        ));
    }
}
