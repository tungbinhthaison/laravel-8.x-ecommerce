<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Blog\Backend\BCategoryController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Blog
// Route::prefix('blog')->group(function () {
//     Route::prefix('category')->group(function () {
//         Route::get('get-list',[BCategoryController::class, 'getList']);
//         Route::get('get-list-datatable',[BCategoryController::class, 'getListDatatable']);

//     });
// });