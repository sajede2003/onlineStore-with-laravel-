<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
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

Route::get('/register' , [UserController::class , 'registerGet']);
Route::post('/register' , [UserController::class , 'registerPost']);

Route::get('/login' , [UserController::class , 'loginGet']);
Route::post('/login' , [UserController::class , 'loginPost']);

Route::prefix('dashboard')->group(function (){
    Route::get('/' , [AdminController::class , 'index']);
    Route::get('/users' , [\App\Http\Controllers\Admin\UsersController::class , 'index']);
    Route::get('/category' , [CategoryController::class , 'index']);
    Route::get('/product' , [\App\Http\Controllers\Admin\ProductController::class , 'index']);
});

Route::get('/logout' , [HomeController::class , 'logOut']);