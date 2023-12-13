<?php

use App\Helpers\Settings;
use App\Http\Controllers\Admin\AdvertisementController;
use App\Http\Controllers\Admin\AnalyticController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\PlacementController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SocialmediaController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\ThemeController;
use App\Http\Controllers\Admin\TranslationController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\UserDarkModeController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\Admin\EventCalendarController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Auth\LogoutController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\Admin\LiveController;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// ------------------------------------ Authentication ------------------------------------
if (Schema::hasTable('settings')) {
    Route::prefix(LaravelLocalization::setLocale())->middleware('XSS', 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath')->group(function () {
        Settings::key('register') == 'y' ? Auth::routes() : Auth::routes(['register' => false]);

        if (Settings::key('email_verification') == 'y') {
            Auth::routes(['verify' => true]);

            Route::get('/email/verify', function () {
                return view('auth.verify');
            })->middleware('auth')->name('verification.notice');
        }
    });
}
Route::post('logout', LogoutController::class);

// ------------------------------------ Dashboard ------------------------------------
Route::get('admin/dashboard', DashboardController::class)
    ->name('admin.dashboard')
    ->middleware(['auth', 'user-locale', 'is-ban', 'verified']);

Route::get('admin', function () {
    return redirect()->route('admin.dashboard');
});

Route::get('admin/manage', function () {
    return redirect()->route('admin.dashboard');
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'user-locale', 'is-ban', 'verified']], function () {
    //SETTING
    Route::controller(SettingController::class)->group(function () {
        Route::patch('settings/changeStatusMaintenance', 'changeMaintenance');
        Route::patch('settings/changeRegisterMember', 'changeRegisterMember');
        Route::patch('settings/change-active-email-verification', 'changeActiveEmailVerification');
        Route::get('settings/change-dashboard-language', 'changeDashboardLanguage')
            ->name('switch.lang');
        Route::patch('settings/switch-display-language', 'changeDisplayLanguage')
            ->name('switch.display.lang');
        Route::patch('settings/change-theme-language', 'changeThemeLanguage');
    });

    // CHANGE PERMISSION
    Route::patch('change-permission', [RoleController::class, 'changePermission']);
    Route::patch('change-all-permission', [RoleController::class, 'changeAllPermission']);

    //ADS
    Route::get('change-ad-active', [AdvertisementController::class, 'changeAdActive']);
    Route::get('change-placement-active', [PlacementController::class, 'changePlacementActive']);

    //THEMES
    Route::get('data/themes', [ThemeController::class, 'theme'])
        ->name('theme')
        ->middleware('auth');

    //USER
    Route::get('getsocmed', [SocialmediaController::class, 'getSocmed']);

    //LANG
    Route::controller(LanguageController::class)->group(function () {
        Route::get('getlangcode', 'getLangCode');

        Route::get('change-language-default', 'changeDefault');
        Route::get('show-language', 'dataSelectOption')
            ->name('getdatalanguage');
    });

    //GALLERY
    Route::get('gallery/show/{filename}', function ($filename) {
        return Image::make(storage_path('app/public/images/' . $filename))->response();
    })->name('gallery.show.image');

    //Video Routes
    Route::get('video', [VideoController::class, 'index'])->name('video.index');
    Route::get('video/create', [VideoController::class, 'create'])->name('video.create');
    Route::post('video/store', [VideoController::class, 'store'])->name('video.store');
    Route::get('video/edit/{video_id}', [VideoController::class, 'edit'])->name('video.edit');
    Route::post('video/update/{video_id}', [VideoController::class, 'update'])->name('video.update');
    Route::get('video/delete/{video_id}', [VideoController::class, 'delete'])->name('video.delete');

    //Slider Routes
    Route::get('slider', [SliderController::class, 'index'])->name('slider.index');
    Route::get('slider/create', [SliderController::class, 'create'])->name('slider.create');
    Route::post('slider/store', [SliderController::class, 'store'])->name('slider.store');
    Route::get('slider/edit/{slider_id}', [SliderController::class, 'edit'])->name('slider.edit');
    Route::post('slider/update/{slider_id}', [SliderController::class, 'update'])->name('slider.update');
    Route::get('slider/delete/{slider_id}', [SliderController::class, 'delete'])->name('slider.delete');


    //Live
    Route::get('live', [LiveController::class, 'index'])->name('live.index');
    Route::get('live/create', [LiveController::class, 'create'])->name('live.create');
    Route::post('live/store', [LiveController::class, 'store'])->name('live.store');
    Route::get('live/edit/{live_id}', [LiveController::class, 'edit'])->name('live.edit');
    Route::post('live/update/{live_id}', [LiveController::class, 'update'])->name('live.update');
    Route::get('live/delete/{live_id}', [LiveController::class, 'delete'])->name('live.delete');

    //CalendarEvent Routes
    Route::get('calendar-event', [EventCalendarController::class, 'index'])->name('calendar.event.index');
    Route::get('calendar-event/create', [EventCalendarController::class, 'create'])->name('calendar.event.create');
    Route::post('calendar-event/store', [EventCalendarController::class, 'store'])->name('calendar.event.store');
    Route::get('calendar-event/edit/{video_id}', [EventCalendarController::class, 'edit'])->name('calendar.event.edit');
    Route::post('calendar-event/update/{video_id}', [EventCalendarController::class, 'update'])->name('calendar.event.update');
    Route::get('calendar-event/delete/{video_id}', [EventCalendarController::class, 'delete'])->name('calendar.event.delete');

});

// ------------------------------------ AJAX ------------------------------------
Route::group(['prefix' => 'ajax', 'middleware' => ['auth', 'user-locale', 'is-ban', 'verified']], function () {
    Route::get('advertisement/search', [AdvertisementController::class, 'ajaxSearch'])
        ->name('advertisement.search');
    Route::get('categories/search', [CategoryController::class, 'ajaxSearch'])
        ->name('categories.search');
    Route::get('categories/category-search', [CategoryController::class, 'ajaxCategorySearch'])
        ->name('categories.category.search');

    Route::controller(LanguageController::class)->group(function () {
        Route::get('language/search', 'ajaxSearch')
            ->name('langcode.search');
        Route::get('language/show/group', 'showGroup')
            ->name('group.search');
        Route::get('language/show/search', 'showLanguage')
            ->name('language.search');
    });

    Route::get('menu/search', [MenuController::class, 'ajaxSearch'])
        ->name('menu.search');

    Route::get('post/get-slug', [PostController::class, 'getSlug']);

    Route::post('/post/category', [PostController::class, 'categoryStore'])
        ->name('posts.categories.store');

    Route::get('roles/search', [RoleController::class, 'ajaxSearch'])
        ->name('roles.search');

    Route::controller(SettingController::class)->group(function () {
        Route::get('session-by-device', 'sessionDeviceSetPeriode')
            ->name('device.analytics');
        Route::get('session-visitor-pageview', 'visitorPageViewSetPeriode')
            ->name('visitorpageview.analytics');
        Route::get('session-by-device', 'sessionDeviceSetPeriode')
            ->name('device.analytics');
    });

    Route::get('socialmedia/search', [SocialmediaController::class, 'ajaxSearch'])
        ->name('socialmedia.search');
    Route::get('tags/search', [TagController::class, 'tagsSearch'])
        ->name('tags.search');
    Route::get('translation/group/get', [TranslationController::class, 'getGroup'])
        ->name('translations.group.list');
});

// ------------------------------------ PROFILE ------------------------------------
Route::prefix('admin')->middleware(['auth', 'user-locale', 'is-ban', 'verified'])->group(function () {
    Route::get('avatar/{filename}', function ($filename) {
        if (Storage::disk('public')->exists('avatar/' . $filename)) {
            return Image::make(storage_path('app/public/avatar/' . $filename))->response();
        } else {
            return Image::make(public_path('img/noavatar.png'))->response();
        }
    })->name('profile.photo');

    Route::controller(ProfileController::class)->group(function () {
        Route::get('profile', 'index')
            ->name('profile.index');
        Route::patch('profile/{id}', 'update')
            ->name('profile.update');
        Route::get('change-password', 'change_password')
            ->name('view.password.edit');
        Route::post('change-password', 'password_update')
            ->name('auth.password.update');
        Route::get('localization/language',  'ajaxSearch')
            ->name('languages.list');
    });
});

// ------------------------------------ GALLERY ------------------------------------
Route::get('gallery/show/{filename}', function ($filename) {
    return Image::make(storage_path('app/public/images/' . $filename))->response();
})->name('gallery.show.image');

// ------------------------------------ ADMIN MANAGE ------------------------------------
Route::prefix('admin/manage')->middleware(['auth', 'user-locale', 'is-ban', 'verified'])->group(function () {
    Route::post('/user/darkmode/toggle', [UserDarkModeController::class, 'toggle'])
        ->name('user.darkmode.toggle');

    Route::get('ads/massdestroy', [AdvertisementController::class, 'massdestroy'])
        ->name('ads.massdestroy');

    Route::get('categories/massdestroy', [CategoryController::class, 'massdestroy'])
        ->name('categories.massdestroy');

    Route::get('contacts/massdestroy', [ContactController::class, 'massdestroy'])
        ->name('contacts.massdestroy');

    Route::patch('languages/{language}/active', [LanguageController::class, 'setActive']);
    Route::patch('languages/{language}/default', [LanguageController::class, 'setDefault']);

    Route::get('languages/massdestroy', [LanguageController::class, 'massdestroy'])
        ->name('languages.massdestroy');

    Route::controller(MenuController::class)->group(function () {
        Route::get('menus/{menu_id}/item/{item_id}/edit', 'editItemMenu')
            ->name('menus.edititem');
        Route::post('menus/storeitem', 'storeItemMenu')
            ->name('menus.storeitem');
        Route::put('menus/updateitemmenu/{id}', 'updateItemMenu')
            ->name('menus.updateitemmenu');
        Route::put('menus/updatemenustructure/{id}', 'updateMenuStructure')
            ->name('menus.updatemenustructure');
        Route::get('menus/massdestroy', 'massdestroy')
            ->name('menus.massdestroy');
        Route::get('menus/{menu_id}/select-language', 'selectLanguageItemMenu')
            ->name('menus.select.language');
        Route::get('menus/{menu_id}/lang/{lang}', 'showMenuItem')
            ->name('menus.show.item');
        Route::post('menusshow', 'showMenu')
            ->name('menusshow');
        Route::get('menulist/{menu_id}/lang/{lang}', 'menulist')
            ->name('menulist');
        Route::delete('/menus/{menu_id}/item/{id}', 'deleteitemmenu')
            ->name('deleteitemmenu');
    });

    Route::get('pages/massdestroy', [PageController::class, 'massdestroy'])
        ->name('pages.massdestroy');
    Route::get('pages/create/{id}/translation', [PageController::class, 'createTranslate'])
        ->name('pages.create.translate');

    Route::get('posts/massdestroy', [PostController::class, 'massdestroy'])
        ->name('posts.massdestroy');
    Route::get('posts/create/{id}/translation', [PostController::class, 'createTranslate'])
        ->name('posts.create.translate');

    Route::get('roles/massdestroy', [RoleController::class, 'massdestroy'])
        ->name('roles.massdestroy');

    Route::controller(SettingController::class)->group(function () {
        Route::get('settings/export-storage/', 'exportStorage')
            ->name('export.storage');
        Route::get('settings/export/', 'export')
            ->name('export');
        Route::post('settings/import/', 'import')
            ->name('import');
        Route::get('settings', 'setting')
            ->name('settings.index');
        Route::patch('settings/update', 'settingUpdate')
            ->name('settings.update');
        Route::get('settings/symlink', 'symlink')
            ->name('symlink');
    });

    Route::get('socialmedia/massdestroy', [SocialmediaController::class, 'massdestroy'])
        ->name('socialmedia.massdestroy');

    Route::get('tags/massdestroy', [TagController::class, 'massdestroy'])
        ->name('tags.massdestroy');

    Route::patch('themes/activated', [ThemeController::class, 'activated'])
        ->name('theme.activated');

    Route::get('translations/massdestroy', [TranslationController::class, 'massdestroy'])
        ->name('translations.massdestroy');

    Route::get('users/massdestroy', [UserController::class, 'massdestroy'])
        ->name('users.massdestroy');

    Route::get('filemanager', function () {
        return view('admin.filemanager.index');
    });

    Route::resource('advertisement', AdvertisementController::class);
    Route::resource('analytics', AnalyticController::class);
    Route::resource('categories', CategoryController::class);
   // Route::put('categories', CategoryController::class,'update');

    Route::resource('contacts', ContactController::class);
    Route::resource('galleries', GalleryController::class);
    Route::resource('languages', LanguageController::class);
    Route::resource('menus', MenuController::class);
    Route::resource('pages', PageController::class);
    Route::resource('placements', PlacementController::class);
    Route::resource('posts', PostController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('socialmedia', SocialmediaController::class);
    Route::resource('tags', TagController::class);
    Route::resource('themes', ThemeController::class);
    Route::resource('translations', TranslationController::class);
    Route::resource('users', UserController::class);
});


