<?php

use App\Helpers\Utl;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\MailChimController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Http\Controllers\GalleryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// ------------------------------------ Logo & Image ------------------------------------
//For adding an image
Route::get('/add-image',[GalleryController::class,'addImage'])->name('images.add');

//For storing an image
Route::post('/store-image',[GalleryController::class,'storeImage'])
->name('images.store');

//For showing an image
Route::get('/view-image',[GalleryController::class,'viewImage'])->name('images.view');
Route::middleware('optimizeImages')->group(function () {
    Route::controller(ImageController::class)->group(function () {
        Route::patch('image-crop', 'uploadUserPhoto');
        Route::post('upload-image', 'uploadImagePost')
            ->name('uploadImage');
        Route::post('upload-image-ad', 'uploadImageAd')
            ->name('uploadImageAd');
        Route::post('resizeImagePost', 'resizeImagePost')
            ->name('resizeImagePost');
    });
});

Route::controller(ImageController::class)->group(function () {
    Route::get('images/{filename}', 'showImage')
        ->name('image.show');
    Route::get('image/{filename}', 'displayImage')
        ->name('image.displayImage');
    Route::get('get/post/image/{filename}', 'displayPostImage')
        ->name('post.image');
    Route::get('get/postimage/{filename}', 'displayPostImageWithoutNoImage')
        ->name('image.post');
    Route::post('image-delete', 'removeUploadImage')
        ->name('removeUploadImage');
    Route::post('image-crop', 'uploadUserPhoto');
});

Route::get('photo-author/{filename}', function ($filename){
    if(Utl::checkFileDisk('avatar/'.$filename, 'public')){
        return Image::make(storage_path('app/public/avatar/' . $filename))->response();
    }else{
        return Image::make(public_path('img/noavatar.png'))->response();
    }
})->name('author.photo');

Route::get('logo/{filename}', function ($filename)
{
    if(Storage::disk('public')->exists('assets/' . $filename)){
        return Image::make(storage_path('app/public/assets/' . $filename))->response();
    }else{
        return Image::make(public_path('themes/magz/images/logo.png'))->response();
    }
})->name('logo.display');

Route::get('icon/{filename}', function ($filename)
{
    if(Storage::disk('public')->exists('assets/' . $filename)){
        return Image::make(storage_path('app/public/assets/' . $filename))->response();
    }else{
        return Image::make(public_path('favicons/favicon-96x96.png'))->response();
    }
})->name('icon.display');

Route::get('ogi/{filename}', function ($filename)
{
    if(Storage::disk('public')->exists('images/' . $filename)){
        return Image::make(storage_path('app/public/images/' . $filename))->response();
    }else{
        return Image::make(public_path('img/cover.png'))->response();
    }
})->name('ogi.display');

Route::get('dashboard/logo/{filename}', function ($filename)
{
    if(Storage::disk('public')->exists('assets/' . $filename)){
        return Image::make(storage_path('app/public/assets/' . $filename))->response();
    }else{
        return Image::make(public_path('img/logo.png'))->response();
    }
})->name('dashboard.logo');

Route::get('auth/logo/{filename}', function ($filename)
{
    if(Storage::disk('public')->exists('assets/' . $filename)){
        return Image::make(storage_path('app/public/assets/' . $filename))->response();
    }else{
        return Image::make(public_path('img/logo-auth.png'))->response();
    }
})->name('auth.logo');

Route::post('subscribe', [MailChimController::class, 'subscribe'])
    ->name('subscribe');

