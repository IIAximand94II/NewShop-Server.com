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

// api for client
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



// api for Admin SPA Dashboard
Route::group(['prefix' => 'admin'], function(){
    Route::group(['prefix'=>'categories'], function(){
        Route::get('/', [\App\Http\Controllers\CategoryController::class, 'index']);
    });

    Route::group(['prefix'=>'tags'], function(){
        Route::get('/', [\App\Http\Controllers\TagController::class, 'index']);
    });

    Route::group(['prefix'=>'colors'], function(){
        Route::get('/', [\App\Http\Controllers\ColorController::class, 'index']);
    });

    Route::group(['prefix'=>'sizes'], function(){
        Route::get('/', [\App\Http\Controllers\SizeController::class, 'index']);
    });

    Route::group(['prefix'=>'products'], function(){
        Route::get('/', [\App\Http\Controllers\ProductController::class, 'index']);
    });

    Route::group(['prefix'=>'images'], function(){
        Route::get('/', [\App\Http\Controllers\ImageController::class, 'index']);
    });

    Route::group(['prefix'=>'users'], function(){
        Route::get('/', [\App\Http\Controllers\UserController::class, 'index']);
    });

    Route::group(['prefix'=>'reviews'], function(){
        Route::get('/', [\App\Http\Controllers\ReviewController::class, 'index']);
    });

    Route::group(['prefix'=>'orders'], function(){
        Route::get('/', [\App\Http\Controllers\OrderController::class, 'index']);
    });
});

