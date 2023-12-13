<?php

namespace App\Http\Controllers\Front;

use Illuminate\Contracts\View\View;
use App\Models\{Post, Submenu, Term, Language};
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\View\Factory;
use App\Helpers\{Posts, Settings, Socialmedias};
use Illuminate\Contracts\Foundation\Application;
use Artesaos\SEOTools\Facades\{OpenGraph, SEOTools};
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class PageController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param Post $page
     * @return Application|Factory|View
     */
    public function show(Post $page)
    {
        preg_match_all('/src="([^"]*)"/', $page->post_content, $result);

        $getCurrentLocale= LaravelLocalization::getCurrentLocale() ? LaravelLocalization::getCurrentLocale() : Settings::key('theme_language');

        $value = $page->translations->first()->value;

        if (count(json_decode($value, true)) > 1) {
            $pageId = data_get(json_decode($value, true), $getCurrentLocale);
        } else {
            $pageId = $page->id;
        }

        $page = Post::find($pageId);

        if ( $page->post_visibility != "public" || $page->post_status == "draft") {
            if (!Auth::check()) {
                return abort(404);
            } else {
                if ($page->post_author != Auth::id()) {
                    return abort(404);
                }
            }
        }

        if ($page->post_image) {
            if($page->post_image != "noimage.png"){
                $image = route('ogi.display', $page->post_image);
            } else {
                $image = asset('images/cover.png');
            }
        } else {
            if ($result[0]) {
                $image = route('ogi.display', last(explode('/', $result[1][0])));
            } else {
                $image = asset('images/cover.png');
            }
        }

        $twitter = Socialmedias::twitter() ?: Settings::key('site_name');

        SEOTools::setTitle($page->post_title);

        if ($page->meta_description) {
            $description = $page->meta_description;
        } else {
            if ($page->post_summary) {
                $description = Str::limit(strip_tags($page->post_summary), 160);
            } else {
                if ($page->post_content) {
                    $description = Str::limit(strip_tags($page->post_content), 160);
                } else {
                    $description = Settings::key('site_description');
                }
            }
        }

        if ($page->meta_keyword) {
            $keyword = $page->meta_keyword;
        } else {
            $keyword = Settings::key('meta_keyword');
        }

        SEOTools::setDescription($description);
        SEOTools::metatags()->setKeywords($keyword);
        SEOTools::setCanonical(Settings::key('site_url'));

        OpenGraph::setTitle($page->post_title)
            ->setDescription($description)
            ->setType('article')
            ->setArticle([
                'published_time' => $page->created_at,
                'modified_time' => $page->updated_at,
                'author' => $page->user->name,
            ]);

        SEOTools::opengraph()->setUrl(Posts::getUriPage($page));
        SEOTools::opengraph()->setSiteName(Settings::key('company_name'));
        SEOTools::opengraph()->addImage($image);

        SEOTools::twitter()->setSite('@' . $twitter);
        SEOTools::twitter()->setTitle($page->post_title);
        SEOTools::twitter()->setDescription($description);
        SEOTools::twitter()->setUrl(Posts::getUriPage($page));
        SEOTools::twitter()->setImage($image);

        SEOTools::jsonLd()->setTitle($page->post_title);
        SEOTools::jsonLd()->setDescription($description);
        SEOTools::jsonLd()->setType('WebPage');
        SEOTools::jsonLd()->setUrl(Posts::getUriPage($page));
        SEOTools::jsonLd()->addImage($image);

        $queryLanguage = Language::query();
        $language_count = $queryLanguage->count();
        $languages = $queryLanguage->active()->pluck('language', 'language_code');

        $tag_count = Term::tag()->whereHas('posts')->withCount('posts')->orderBy('posts_count', 'desc')->get();

        $latestNews = Posts::query()->latest()->limit(4)->get();

        $menu = Submenu::get();

        return view(Settings::active_theme('page/page'), compact(
            'languages',
            'language_count',
            'tag_count',
            'page',
            'latestNews',
            'menu'
        ));
    }


}
