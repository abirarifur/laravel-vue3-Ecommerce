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

Route::group(['prefix' => 'admin/product', 'middleware' => 'auth:sanctum'], function () {
    Route::get('/', [App\Http\Controllers\Admin\ProductController::class, 'index']);
    Route::post('add', [App\Http\Controllers\Admin\ProductController::class, 'store']);
    Route::get('edit/{id}', [App\Http\Controllers\Admin\ProductController::class, 'edit']);
    Route::post('update/{id}', [App\Http\Controllers\Admin\ProductController::class, 'update']);
    Route::delete('delete/{id}', [App\Http\Controllers\Admin\ProductController::class, 'delete']);
});
