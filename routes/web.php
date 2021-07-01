<?php

use Illuminate\Support\Facades\DB;
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

Auth::routes();

Route::get('/', [App\Http\Controllers\SiteController::class, 'index']);
Route::get('/product/{slug}',[App\Http\Controllers\ProductsController::class, 'index'])->name('product.detail');
Route::get('/shop/{cat}/{slug?}',[App\Http\Controllers\ProductsController::class, 'category'])->name('product.category');
Route::get('/shop',[App\Http\Controllers\SiteController::class, 'shop'])->name('shop');
Route::get('/search', App\Http\Livewire\SearchComponent::class)->name('product.search');
Route::get('/cart',[App\Http\Controllers\SiteController::class, 'cart'])->name('cart');
Route::get('/checkout',[App\Http\Controllers\SiteController::class, 'checkout'])->name('checkout');

Route::get('/privacy-policy',[App\Http\Controllers\SiteController::class, 'privacy'])->name('privacy');
Route::get('/terms-conditions',[App\Http\Controllers\SiteController::class, 'terms'])->name('terms');
Route::get('/return-policy',[App\Http\Controllers\SiteController::class, 'return'])->name('returns');
Route::get('/about-us',[App\Http\Controllers\SiteController::class, 'about'])->name('about');
Route::get('/contact-us',[App\Http\Controllers\SiteController::class, 'contact'])->name('contact');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth', 'is_admin', 'web'])->group(function () {
    Route::get('dashboard', [App\Http\Controllers\Admin\AdminController::class, 'dashboard'] )->name('admin.dashboard');
    Route::get('images',[App\Http\Controllers\Admin\AdminController::class, 'categories'])->name('admin.categories');
    Route::get('categories',[App\Http\Controllers\Admin\AdminController::class, 'images'])->name('admin.images');
    Route::get('products',[App\Http\Controllers\Admin\AdminController::class, 'products'])->name('admin.products');
    Route::get('users',[App\Http\Controllers\Admin\AdminController::class, 'users'])->name('admin.users');

});

Route::middleware(['auth', 'web'])->group(function(){
    Route::get('dashboard', [App\Http\Controllers\Customers\CustomerController::class, 'index'])->name('user.dashboard');
});

Route::get('/dbseed', [App\Http\Controllers\SiteController::class, 'dbseed']);
