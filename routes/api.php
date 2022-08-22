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
    Route::post('/', [\App\Http\Controllers\API\ProductController::class, 'index']);
    Route::get('/hits', [\App\Http\Controllers\API\ProductController::class, 'hits']);
    Route::get('/{product}', [\App\Http\Controllers\API\ProductController::class, 'show']);

    Route::group(['middleware'=>'auth:sanctum'], function(){
        Route::post('/wishlist', [\App\Http\Controllers\API\WishlistController::class, 'store']);
    });
});

Route::group(['prefix'=>'auth'], function(){
    Route::post('/register', [\App\Http\Controllers\API\AuthController::class, 'register']);
//    Route::get('/email/verify/{id}/{hash}', [\App\Http\Controllers\API\AuthController::class, 'verify'])->name('verification.verify');
//    Route::get('/email/resend', [\App\Http\Controllers\API\AuthController::class, 'resend'])->name('verification.resend');

    Route::group(['middleware'=>'auth:sanctum'], function(){
        Route::get('/profile', [\App\Http\Controllers\API\UserController::class, 'index']);
        Route::post('/logout', [\App\Http\Controllers\API\AuthController::class, 'logout']);
        //Route::post('/refresh', [\App\Http\Controllers\API\AuthController::class, 'refresh']);
        //Route::get('/test', [\App\Http\Controllers\API\TestController::class, 'index']);
    });

    Route::post('/login', [\App\Http\Controllers\API\AuthController::class, 'login']);
    //Route::post('/logout', [\App\Http\Controllers\API\AuthController::class, 'logout']);
    Route::post('/forgot', [\App\Http\Controllers\API\AuthController::class, 'forgot']);
    Route::post('/reset', [\App\Http\Controllers\API\AuthController::class, 'reset']);
});

Route::get('/filters', [\App\Http\Controllers\API\FilterController::class, 'index']);
Route::get('/sliders',[\App\Http\Controllers\API\SliderController::class, 'index']);



