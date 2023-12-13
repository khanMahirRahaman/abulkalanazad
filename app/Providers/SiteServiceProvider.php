<?php

namespace App\Providers;

use Hashids\Hashids;
use App\Services\ArticleService;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\ServiceProvider;
use App\View\Components\Admin\Breadcrumbs;
use App\View\Components\Front\Magz\HotNews;
use App\View\Components\Front\Magz\Headline;

use App\View\Components\Front\Magz\Newsletter;
use App\View\Components\Front\Magz\RelatedPost;
use App\View\Components\Front\Magz\TrendingTags;
use App\View\Components\Front\Magz\ArticleFooter;
use App\View\Components\Front\Magz\BestOfTheWeek;

use App\View\Components\Front\Magz\ArticleSidebar;
use App\View\Components\Front\Magz\LatestNewsHome;
use App\View\Components\Front\Magz\JustAnotherNews;
use App\View\Components\Front\Magz\FeaturedCarousel;


use App\View\Components\Front\Magz\HeadlineCarousel;




use App\View\Components\Front\Magz\AdsHomeHorizontal;
use App\View\Components\Front\Magz\Footer\MenuFooter;

use App\View\Components\Front\Magz\Header\LogoHeader;
use App\View\Components\Front\Magz\Header\MenuHeader;

use App\View\Components\Front\Magz\Header\SearchForm;
;
use App\View\Components\Front\Magz\Footer\AboutFooter;

use App\View\Components\Front\Magz\Footer\FollowUsFooter;
use App\View\Components\Front\Magz\Sidebar\PopularSidebar;
use App\View\Components\Front\Magz\Footer\LatestNewsFooter;
use App\View\Components\Front\Magz\Footer\NewsletterFooter;
use App\View\Components\Front\Magz\Footer\PopularTagsFooter;
use App\View\Components\Front\Magz\Sidebar\AdsSidebarLeftTop;
use App\View\Components\Front\Magz\Sidebar\NewsletterSidebar;
use App\View\Components\Front\Magz\Sidebar\RecentPostSidebar;
use App\View\Components\Front\Magz\Sidebar\AdsSidebarRightTop;
use App\View\Components\Front\Magz\Sidebar\RecommendedSidebar;
use App\View\Components\Front\Magz\Sidebar\AdsSidebarRightBottom;

class SiteServiceProvider extends ServiceProvider
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
        // header
        Blade::component('logo-header', LogoHeader::class);
        Blade::component('menu-header', MenuHeader::class);
        Blade::component('search-form', SearchForm::class);
        Blade::component('headline-carousel', HeadlineCarousel::class);

        // sidebar - home
        Blade::component('newsletter-sidebar', NewsletterSidebar::class);
        Blade::component('recommended-sidebar', RecommendedSidebar::class);
        Blade::component('popular-sidebar', PopularSidebar::class);
        Blade::component('ads-sidebar-right-bottom', AdsSidebarRightBottom::class);

        // sidebar - detail post
        Blade::component('ads-sidebar-left-top', AdsSidebarLeftTop::class);
        Blade::component('recent-post-sidebar', RecentPostSidebar::class);
        Blade::component('ads-sidebar-right-top', AdsSidebarRightTop::class);


        // footer
        Blade::component('about-footer', AboutFooter::class);
        Blade::component('follow-us-footer', FollowUsFooter::class);
        Blade::component('latest-news-footer', LatestNewsFooter::class);
        Blade::component('menu-footer', MenuFooter::class);
        Blade::component('newsletter-footer', NewsletterFooter::class);
        Blade::component('popular-tags-footer', PopularTagsFooter::class);

        // home
        Blade::component('featured-carousel', FeaturedCarousel::class);
        Blade::component('latest-news-home', LatestNewsHome::class);
        Blade::component('ads-home-horizontal', AdsHomeHorizontal::class);
        Blade::component('hot-news', HotNews::class);
        Blade::component('trending-tags', TrendingTags::class);
        Blade::component('just-another-news', JustAnotherNews::class);
        Blade::component('best-of-the-week', BestOfTheWeek::class);
        
        
        $article = New ArticleService();

        $articles = $article->query();

        View::composer('*', function ($view) use ($articles) {
            $view->with('articles', $articles);
        });

        View::share('hashids', new Hashids());

        view()->composer('*', function ($view) {
            $theme = Cookie::get('theme');
            if ($theme != 'dark' && $theme != 'light') {
                $theme = 'light';
            }
        
            $view->with('theme', $theme);
        });
    }
}
