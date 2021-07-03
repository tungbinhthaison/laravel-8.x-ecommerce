<?php
use Illuminate\Support\Facades\Route;
// Root url
Route::get('/', function () {
    return redirect()->route('admmin-login');
});

// Admin > home
use App\Http\Controllers\Admin\AuthenticationController;
use App\Http\Controllers\Admin\DashboardController;

Route::prefix('admin')->group(function () {
    Route::get('login',[AuthenticationController::class, 'getLogin'])->name('admmin-login');
    Route::post('login',[AuthenticationController::class, 'postLogin']);
    Route::get('logout',[AuthenticationController::class, 'getLogout']);
    Route::get('home',[DashboardController::class, 'home']);
});




// Admin > Blog > Access data
use App\Access\Blog\CategoryAccess;
use App\Access\Blog\ArticleAccess;

Route::prefix('admin/blog')->group(function () {
    Route::prefix('category')->group(function () {
        Route::get('get-list-datatable',[CategoryAccess::class, 'getListDatatable']);
    });

    Route::prefix('article')->group(function () {
        Route::get('get-list-datatable',[ArticleAccess::class, 'getListDatatable']);
    });
});

// Admin > Blog > controller
use App\Http\Controllers\Admin\Blog\CategoryController;
use App\Http\Controllers\Admin\Blog\ArticleController;

Route::prefix('admin/blog')->group(function () {
    Route::prefix('category')->group(function () {
        Route::get('index',[CategoryController::class, 'index']);
        Route::get('add',[CategoryController::class, 'add']);
        Route::post('store',[CategoryController::class, 'store']);
        Route::get('edit/{id}',[CategoryController::class, 'edit']);
        Route::post('update/{id}',[CategoryController::class, 'update']);
        Route::delete('delete/{id}',[CategoryController::class, 'delete']);
    });

    Route::prefix('article')->group(function () {
        Route::get('index',[ArticleController::class, 'index']);
        Route::get('add',[ArticleController::class, 'add']);
        Route::post('store',[ArticleController::class, 'store']);
        Route::get('edit/{id}',[ArticleController::class, 'edit']);
        Route::post('update/{id}',[ArticleController::class, 'update']);
        Route::delete('delete/{id}',[ArticleController::class, 'delete']);
    });


});









// Admin > User > Access data
use App\Access\UserAccess;

Route::prefix('admin/user')->group(function () {
    Route::get('get-list-datatable',[UserAccess::class, 'getListDatatable']);
});

// Admin > User > controller
use App\Http\Controllers\Admin\UserController;

Route::prefix('admin/user')->group(function () {
    Route::get('index',[UserController::class, 'index']);
    Route::get('add',[UserController::class, 'add']);
    Route::post('store',[UserController::class, 'store']);
    Route::get('edit/{id}',[UserController::class, 'edit']);
    Route::post('update/{id}',[UserController::class, 'update']);
    Route::delete('delete/{id}',[UserController::class, 'delete']);
});



