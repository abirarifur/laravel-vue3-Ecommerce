<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/login', [App\Http\Controllers\Auth\AuthController::class, 'login']);
Route::post('/logout', [App\Http\Controllers\Auth\AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::group(['prefix' => 'admin', 'middleware' => 'auth:sanctum'], function () {
    Route::group(['prefix' => 'product', 'middleware' => 'auth:sanctum'], function () {
        Route::get('/', [App\Http\Controllers\Admin\ProductController::class, 'index']);
        Route::post('add', [App\Http\Controllers\Admin\ProductController::class, 'store']);
        Route::get('edit/{id}', [App\Http\Controllers\Admin\ProductController::class, 'edit']);
        Route::post('update/{id}', [App\Http\Controllers\Admin\ProductController::class, 'update']);
        Route::delete('delete/{id}', [App\Http\Controllers\Admin\ProductController::class, 'delete']);
    });
    Route::prefix('category')->group(function () {
        Route::get('/', [App\Http\Controllers\Admin\CategoryController::class, 'index']);
        Route::post('add', [App\Http\Controllers\Admin\CategoryController::class, 'store']);
        Route::get('edit/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'edit']);
        Route::post('update/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'update']);
        Route::delete('delete/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'delete']);
    });
    Route::prefix('subcategory')->group(function () {
        Route::get('/', [App\Http\Controllers\Admin\SubcategoryController::class, 'index']);
        Route::get('/getListById', [App\Http\Controllers\Admin\SubcategoryController::class, 'getListById']);
        Route::post('add', [App\Http\Controllers\Admin\SubcategoryController::class, 'store']);
        Route::get('edit/{id}', [App\Http\Controllers\Admin\SubcategoryController::class, 'edit']);
        Route::post('update/{id}', [App\Http\Controllers\Admin\SubcategoryController::class, 'update']);
        Route::delete('delete/{id}', [App\Http\Controllers\Admin\SubcategoryController::class, 'delete']);
    });
});
