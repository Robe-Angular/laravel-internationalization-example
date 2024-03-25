<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    $locale = App::getLocale();
    return redirect('/'. $locale);
})->middleware(['detect_locale']);

Route::prefix('/{locale}')->where(['locale' => 'en|es'])->middleware([])->group(function () {
    Route::view('/','welcome');
    Route::view('/another-page','another_page');
    App::setLocale(request()->segment(1)); // Set the locale based on the first segment of the URI
});

Route::get('/switch-language/{locale}', function ($locale) {
    // You might want to add some validation to ensure the locale is valid.
    App::setLocale($locale);
    return redirect()->back();
})->name('switch-language');