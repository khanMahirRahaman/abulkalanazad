<?php

use App\Helpers\Settings;
use App\Http\Controllers\Front\AdvertisementController;
use App\Http\Controllers\Front\ArticleController;
use App\Http\Controllers\Front\CategoryController;
use App\Http\Controllers\Front\DatedController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\LanguageController;
use App\Http\Controllers\Front\PageController;
use App\Http\Controllers\Front\SitemapController;
use App\Http\Controllers\Front\TagController;
use App\Http\Controllers\SearchController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Front Routes
|--------------------------------------------------------------------------
|
 */

// -------------------------------- Open Graph image  --------------------------------
Route::get('ogi/{filename}', function ($filename) {
    if (Storage::disk('public')->exists('images/' . $filename)) {
        return Image::make(storage_path('app/public/images/' . $filename))->response();
    } else {
        return Image::make(public_path('img/cover.png'))->response();
    }
})->name('ogi.display');

// ------------------------------------ Advertisement ------------------------------------
Route::get('ad/{filename}', [AdvertisementController::class, 'displayAdImage'])->name('ad.image');

// ---------------------------------------- Feed ----------------------------------------
Route::feeds();

// ---------------------------------- Switch language ----------------------------------
Route::get('/language/switch-language/{code}', [LanguageController::class, 'changeSwitchLanguage'])
    ->name('switch.language')
    ->middleware('public', 'XSS', 'language');

Route::prefix(LaravelLocalization::setLocale())->middleware('public', 'XSS', 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'language', 'frontend.locale', 'checkExistsSettings')->group(function () {

    // -------------------------------------- Sitemap --------------------------------------
    Route::controller(SitemapController::class)->group(function () {
        Route::get('/sitemap.xml', 'index')->name('sitemap');
        Route::get('/sitemap-posts.xml', 'posts')->name('sitemap.posts');
        Route::get('/sitemap-pages.xml', 'pages')->name('sitemap.pages');
        Route::get('/sitemap-categories.xml', 'categories')->name('sitemap.categories');
    });
    Route::get('/', [HomeController::class, 'landingPage']);
    Route::get('/home', [HomeController::class, 'index']);
    Route::get('/landing', [HomeController::class, 'landing']);
    Route::get('/video', [HomeController::class, 'video']);
    Route::get('/sidemenu', [PageController::class, 'sidemenu']);

    Route::get('/photos', [HomeController::class, 'gallery']);
    Route::post('calender', [HomeController::class, 'calender'])->name('front.calender');
    Route::get('/search', [SearchController::class, 'search'])->name('search');
    Route::get('/{slug}', [HomeController::class, 'show'])->name('show');
    Route::get('/news/latest', [ArticleController::class, 'index'])->name('articles.latest');
    Route::get('/news/popular', [ArticleController::class, 'showPopular'])->name('article.popular');
    Route::get('/tag/{tag}', [TagController::class, 'index'])->name('tag.show');
    Route::patch('/post/react', [ArticleController::class, 'react'])->name('sendreact');
    Route::get('/post/timeline', [HomeController::class, 'timeLinePosts']);
    Route::get('/landing/timeline', [HomeController::class, 'landingTimeLinePosts']);

    if (Schema::hasTable('settings')) {
        if (Settings::key('permalink')) {
            if (Settings::key('permalink') == "%year%/%month%/%day%") {
                Route::get('/{year}/{month}/{day}/{post:post_name}', function ($year, $month, $day, $post) {
                    $showpost = Post::article()->whereYear('created_at', '=', $year)
                        ->whereMonth('created_at', '=', $month)
                        ->whereDay('created_at', '=', $day)
                        ->wherePostName($post)
                        ->firstOrFail();

                    return app('App\Http\Controllers\Front\ArticleController')->show($showpost);
                })
                    ->name('article.show')
                    ->where('day', '[0-9]+');
            } elseif (Settings::key('permalink') == "%year%/%month%") {
                Route::get('/{year}/{month}/{post:post_name}', function ($year, $month, $post) {
                    $showpost = Post::article()->whereYear('created_at', '=', $year)
                        ->whereMonth('created_at', '=', $month)
                        ->wherePostName($post)
                        ->firstOrFail();

                    return app('App\Http\Controllers\Front\ArticleController')->show($showpost);
                })
                    ->name('article.show');
            } else {
                $word = Settings::key('permalink') != 'post_name' ? Settings::key('permalink') : '';
                $uri = $word . "/{post:post_name}";
                Route::get($uri, function ($post) {
                    $showpost = Post::article()->wherePostName($post)->firstOrFail();;
                    return app('App\Http\Controllers\Front\ArticleController')->show($showpost);
                })
                    ->name('article.show');
            }
            if (Settings::key('category_permalink_type')) {
                if (Settings::key('category_permalink_type') == 'with_prefix_category') {
                    Route::get('/category/{category}', CategoryController::class)->name('category.show');
                }

                if (Settings::key('category_permalink_type') == 'category_name') {
                    Route::get('{term}', CategoryController::class)->name('category.show');
                }
            }
            Route::get('/dated/{date}', DatedController::class)->name('dated.show');
            Route::get('/week/{date}', \App\Http\Controllers\Front\WeekController::class)->name('week.show');
            if (Settings::key('page_permalink_type')) {
                if (Settings::key('page_permalink_type') == 'with_prefix') {
                    Route::get('/page/{page:post_name}', [PageController::class, 'show'])->name('page.show');
                }
                if (Settings::key('page_permalink_type') == 'page_name') {
                    Route::get('/{page:post_name}', [PageController::class, 'show'])->name('page.show');
                }
            }
        }
    }
});
