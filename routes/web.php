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
    return view('welcome');
});

Auth::routes();

Route::get('/product/{slug}',[App\Http\Controllers\ProductsController::class, 'index'])->name('product.detail');
Route::get('/category/{slug}',[App\Http\Controllers\ProductsController::class, 'category'])->name('product.category');

Route::get('/shop',[App\Http\Controllers\SiteController::class, 'shop'])->name('shop');

Route::get('/cart',[App\Http\Controllers\SiteController::class, 'cart'])->name('cart');
Route::get('/checkout',[App\Http\Controllers\SiteController::class, 'checkout'])->name('checkout');

Route::get('/privacy-policy',[App\Http\Controllers\SiteController::class, 'privacy'])->name('privacy');
Route::get('/terms-conditions',[App\Http\Controllers\SiteController::class, 'terms'])->name('terms');
Route::get('/return-policy',[App\Http\Controllers\SiteController::class, 'return'])->name('returns');
Route::get('/about-us',[App\Http\Controllers\SiteController::class, 'about'])->name('about');
Route::get('/contact-us',[App\Http\Controllers\SiteController::class, 'contact'])->name('contact');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
