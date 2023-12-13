<?php

namespace App\Http\Controllers\Front;


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

class CategoryController extends Controller
{
    /**
     * @param Term $term
     * @return Application|Factory|\Illuminate\Contracts\View\View
     */
    public function __invoke(Term $category)
    {
        $getCurrentLocale= LaravelLocalization::getCurrentLocale() ? LaravelLocalization::getCurrentLocale() : Settings::key('theme_language');
        $id = Languages::getIdFromLanguageCode($getCurrentLocale);

        $term = $category;
        $category->load('posts');

        $description = $category->description ? Str::limit(strip_tags($category->description), 160) : '';
//        if($term->id==2) {
//            $paginate_posts = $category->posts()
//                ->where('post_language', $id)
//                ->orderByRaw("DATE_FORMAT(posts.created_at, '%m-%d') DESC")
//                ->paginate(8);
//        }
//        else {
            $paginate_posts = $category->posts()->where('post_language', $id)->orderby("posted_date", "desc")->paginate(8);

//        }

        $hashids = new Hashids();

        $image = (Settings::key('og_image')) ? route('ogi.display', Settings::key('og_image')) :
            asset('img/cover.png');

        if (LaravelLocalization::getCurrentLocaleDirection() == 'rtl') {
            $title = $category->name . " :" . __('theme_magz.category') . " - " . Settings::key('site_name');
        } else {
            $title = Settings::key('site_name') . " - ".__('theme_magz.category') . ": " . $category->name;
        }

        $twitter = Socialmedias::twitter() ?: Settings::key('site_name');


        $latestNews =Posts::query()?Posts::query()->latest()->limit(4)->get():[];

        SEOTools::setTitle($title);
        SEOTools::setDescription($description);
        SEOTools::metatags()->setKeywords(Settings::key('meta_keyword'));
        SEOTools::setCanonical(route('category.show', $category->slug));

        SEOTools::opengraph()->setTitle($title);
        SEOTools::opengraph()->setDescription($description);
        SEOTools::opengraph()->setUrl(route('category.show', $category->slug));
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
        SEOTools::jsonLd()->setUrl(route('category.show', $category->slug));
        SEOTools::jsonLd()->addImage($image);


        return view(Settings::active_theme('page/category'), compact(
            'term', 'paginate_posts', 'hashids', 'latestNews'
        ));

    }
}
