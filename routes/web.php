<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\SinglePageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use  App\Http\Controllers\Admin\UsersController;

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

Route::get('/', [HomeController::class, 'home']);


Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisterController::class, 'get']);
    Route::post('/register', [RegisterController::class, 'post']);
    Route::get('/login', [LoginController::class, 'get']);
    Route::post('/login', [LoginController::class, 'post']);
});

Route::middleware(['auth', 'auth.admin'])->prefix('dashboard')->group(function () {
    Route::get('/', [AdminController::class, 'index']);
    Route::resource('users', UsersController::class)->except(['show', 'create', 'store']);
    Route::resource('category', CategoryController::class)->except('show');
    Route::resource('product', \App\Http\Controllers\Admin\ProductController::class)->except('show');
});

Route::get('/cart', [CartController::class, 'cart'])->name('cart');


Route::middleware(['auth'])->prefix('product')->group(function () {
    Route::get('/', [ProductController::class, 'index']);
    Route::get('/add-to-cart/{product}', [CartController::class, 'addToCart'])->name('addToCart');
    Route::get('/remove-from-cart/{product}', [CartController::class, 'removeFromCart'])->name('removeFromCart');
    Route::prefix('single-page')->group(function (){
        Route::get('/{product}', [SinglePageController::class, 'index'])->name('singlePage');
        Route::get('/add-like/{product}' , [SinglePageController::class , 'addLike'])->name('addLike');
        Route::post('/add-score/{product}' , [SinglePageController::class , 'addScore'])->name('score');
        Route::post('/add-bookmark/{product}' , [SinglePageController::class , 'addBookMark'])->name('addBookmark');
    });
});



Route::post('/logout', [HomeController::class, 'logout']);