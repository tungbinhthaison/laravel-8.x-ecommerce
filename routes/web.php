<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthenticationController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Blog\CategoryController;

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
    return redirect()->route('admmin-login');
});

// Before login
Route::prefix('admin')->group(function () {
    Route::get('login',[AuthenticationController::class, 'getLogin'])->name('admmin-login');
    Route::post('login',[AuthenticationController::class, 'postLogin']);
    Route::get('logout',[AuthenticationController::class, 'getLogout']);
});

// After login
Route::prefix('admin')->group(function () {
    Route::get('home',[DashboardController::class, 'home']);



    // Blog
    Route::prefix('blog')->group(function () {
        Route::prefix('category')->group(function () {
            Route::get('index',[CategoryController::class, 'index']);
        });
    });



    
});
