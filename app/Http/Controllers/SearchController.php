<?php

namespace App\Http\Controllers;

use Hashids\Hashids;
use App\Helpers\{Posts, Settings, Socialmedias};
use Illuminate\View\View;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\Foundation\Application;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Models\Post;

class SearchController extends Controller
{
    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    public function search(Request $request)
    {
        $hashids = new Hashids();
        $keyword = $request->get('q');

        $post = Posts::query();
        $hotNews       = [];
        $latestArticle = [];
        $latestNews    =  $post->latest()->limit(4)->get();

        $query_search = Post::where(function($query) use ($keyword) {
            $query->where('post_title', 'like', "%".$keyword."%")
            ->orWhere('post_content', 'like', "%".$keyword."%")
            ->orWhere('post_image', 'like', "%".$keyword."%")
            ->orWhereHas('terms', function ($query) use ($keyword) {
                $query->where('name', $keyword);
            });
        });

        $results       = $query_search->paginate(4);
        $countResults  = $query_search->count();

        $image = (Settings::key('og_image')) ? route('ogi.display', Settings::key('og_image')) :
            asset('img/cover.png');

        if (LaravelLocalization::getCurrentLocaleDirection() == 'rtl') {
            $page = ($results->currentPage() == 1) ? "" : $results->currentPage() . " " . __('theme_magz.page') . " - ";
            $title = $page . " " . $keyword . " :" . __('theme_magz.search') . " - " . Settings::key('site_name');
        } else {
            $page = ($results->currentPage() == 1) ? "" : " - " . __('theme_magz.page') . " " . $results->currentPage();
            $title = Settings::key('site_name'). " - ".__('theme_magz.search').": " . $keyword ." " . $page;
        }

        $twitter = Socialmedias::twitter() ?: Settings::key('site_name');

        SEOTools::setTitle($title);
        SEOTools::setDescription(Settings::key('site_description'));
        SEOTools::metatags()->setKeywords(Settings::key('meta_keyword'));
        SEOTools::setCanonical(Settings::key('site_url'));

        SEOTools::opengraph()->setTitle($title);
        SEOTools::opengraph()->setDescription(Settings::key('site_description'));
        SEOTools::opengraph()->setUrl(Settings::key('site_url'));
        SEOTools::opengraph()->setSiteName(Settings::key('company_name'));
        SEOTools::opengraph()->addImage($image);

        SEOTools::twitter()->setSite('@' . $twitter);
        SEOTools::twitter()->setTitle($title);
        SEOTools::twitter()->setDescription(Settings::key('site_description'));
        SEOTools::twitter()->setUrl(Settings::key('site_url'));
        SEOTools::twitter()->setImage($image);

        SEOTools::jsonLd()->setTitle($title);
        SEOTools::jsonLd()->setDescription(Settings::key('site_description'));
        SEOTools::jsonLd()->setType('WebPage');
        SEOTools::jsonLd()->setUrl(Settings::key('site_url'));
        SEOTools::jsonLd()->addImage($image);

        return view(Settings::active_theme('page/search'), compact(
            'results',
            'keyword',
            'hotNews',
            'latestNews',
            'countResults',
            'hashids'));
    }
}
