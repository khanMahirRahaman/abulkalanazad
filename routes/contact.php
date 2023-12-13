<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Contact\ContactController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::prefix(LaravelLocalization::setLocale())->middleware('public','XSS','localeSessionRedirect','localizationRedirect','localeViewPath')->group(function () {
    Route::get('/contact', [ContactController::class, 'index'])
        ->name('contact');
    Route::post('/sendcontact', [ContactController::class, 'store'])
        ->name('sendcontact');
});
