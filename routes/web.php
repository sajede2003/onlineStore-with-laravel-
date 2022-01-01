<?php

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

Route::get('/', [HomeController::class , 'home']);

Route::get('/product' , [ProductController::class , 'index']);

Route::get('/register' , [RegisterController::class , 'registerGet']);
Route::post('/register' , [RegisterController::class , 'registerPost']);

Route::get('/login' , [LoginController::class , 'loginGet']);
Route::post('/login' , [LoginController::class , 'loginPost']);

Route::prefix('dashboard')->group(function (){
    Route::get('/' , [AdminController::class , 'index']);
    Route::get('/users' , [UsersController::class , 'index']);
    Route::get('/category' , [CategoryController::class , 'index']);
    Route::get('/product' , [\App\Http\Controllers\Admin\ProductController::class , 'index']);
});

Route::post('/logout' , [HomeController::class , 'logout']);