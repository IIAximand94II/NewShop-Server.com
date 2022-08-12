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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix'=>'products'], function(){
    Route::get('/', [\App\Http\Controllers\API\ProductController::class, 'index']);
    Route::get('/hit', [\App\Http\Controllers\API\ProductController::class, 'hit']);
    Route::get('/{product}', [\App\Http\Controllers\API\ProductController::class, 'show']);
});

Route::group(['prefix'=>'filters'], function(){
    Route::get('/', [\App\Http\Controllers\API\FilterController::class, 'index']);
});



