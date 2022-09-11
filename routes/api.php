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
Route::group(['prefix' => 'client'], function(){
    // products
    Route::group(['prefix'=>'products'], function(){
        Route::post('/', [\App\Http\Controllers\API\ProductController::class, 'index']);
        Route::get('/hits', [\App\Http\Controllers\API\ProductController::class, 'hits']);
        Route::get('/{product}', [\App\Http\Controllers\API\ProductController::class, 'show']);

        Route::group(['prefix' => '{product}/review'], function(){
            Route::post('/', [\App\Http\Controllers\API\ReviewController::class, 'store']);
        });

        Route::group(['middleware'=>'auth:sanctum'], function(){
            Route::post('/wishlist', [\App\Http\Controllers\API\WishlistController::class, 'store']);
        });
    });


// blog
    Route::group(['prefix' => 'blog'], function(){
        Route::group(['prefix' => 'posts'], function(){
            Route::get('/', [\App\Http\Controllers\API\Blog\PostController::class, 'index']);
            Route::get('/{post}', [\App\Http\Controllers\API\Blog\PostController::class, 'show']);

            Route::group(['prefix' => '{post}/comments'], function(){
                Route::post('/', [\App\Http\Controllers\API\Blog\CommentController::class, 'store']);
            });
        });

        Route::group(['prefix' => 'categories'], function(){
            Route::get('/', [\App\Http\Controllers\API\Blog\CategoryController::class, 'index']);
        });

        Route::group(['prefix' => 'tags'], function(){
            Route::get('/', [\App\Http\Controllers\API\Blog\TagController::class, 'index']);
        });
    });

    Route::group(['prefix'=>'auth'], function(){
        Route::post('/register', [\App\Http\Controllers\API\AuthController::class, 'register']);
//    Route::get('/email/verify/{id}/{hash}', [\App\Http\Controllers\API\AuthController::class, 'verify'])->name('verification.verify');
//    Route::get('/email/resend', [\App\Http\Controllers\API\AuthController::class, 'resend'])->name('verification.resend');

        Route::group(['middleware'=>'auth:sanctum'], function(){

            Route::post('/logout', [\App\Http\Controllers\API\AuthController::class, 'logout']);
            Route::get('/', [\App\Http\Controllers\API\UserController::class, 'index']);
            //Route::post('/refresh', [\App\Http\Controllers\API\AuthController::class, 'refresh']);
            //Route::get('/test', [\App\Http\Controllers\API\TestController::class, 'index']);

//            Route::group(['prefix'=>'profile'], function(){
//
//                Route::group(['prefix' => '{user}/address'], function(){
//                    Route::post('/', [\App\Http\Controllers\API\Profile\AddressController::class, 'store']);
//                    Route::patch('/{address}', [\App\Http\Controllers\API\Profile\AddressController::class, 'update']);
//                    Route::delete('/{address}', [\App\Http\Controllers\API\Profile\AddressController::class, 'delete']);
//                });
//
//            });

        });

        Route::post('/login', [\App\Http\Controllers\API\AuthController::class, 'login']);
        //Route::post('/logout', [\App\Http\Controllers\API\AuthController::class, 'logout']);
        Route::post('/forgot', [\App\Http\Controllers\API\AuthController::class, 'forgot']);
        Route::post('/reset', [\App\Http\Controllers\API\AuthController::class, 'reset']);
    });

    // profile
    Route::group(['prefix'=>'profile', 'middleware' => 'auth:sanctum'], function(){

        Route::group(['prefix' => '{user}/address'], function(){
            Route::post('/', [\App\Http\Controllers\API\Profile\AddressController::class, 'store']);
            Route::patch('/{address}', [\App\Http\Controllers\API\Profile\AddressController::class, 'update']);
            Route::delete('/{address}', [\App\Http\Controllers\API\Profile\AddressController::class, 'delete']);
        });

    });

    Route::get('/filters', [\App\Http\Controllers\API\FilterController::class, 'index']);
    Route::get('/sliders',[\App\Http\Controllers\API\SliderController::class, 'index']);

});





// api for Admin SPA Dashboard
Route::group(['prefix' => 'admin'], function(){

    // Products(products,products group,categories,tags,sizes,colors)
    Route::group(['prefix'=>'products'], function(){
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

        // product
        Route::get('/', [\App\Http\Controllers\ProductController::class, 'index']);
        Route::get('/{product}', [\App\Http\Controllers\ProductController::class, 'show']);
        Route::post('/', [\App\Http\Controllers\ProductController::class, 'store']);
        Route::patch('/', [\App\Http\Controllers\ProductController::class, 'update']);
        Route::delete('/', [\App\Http\Controllers\ProductController::class, 'delete']);

        // single product in product group
        Route::group(['prefix' => 'single'], function(){
            Route::post('/', [\App\Http\Controllers\ProductGroupController::class, 'store']);
            Route::get('/{single}', [\App\Http\Controllers\ProductGroupController::class, 'show']);
            Route::patch('/', [\App\Http\Controllers\ProductGroupController::class, 'update']);
            Route::delete('/', [\App\Http\Controllers\ProductGroupController::class, 'delete']);
        });

    });

    // Blog(posts,categories,tags,comments)
    Route::group(['prefix' => 'blog'], function(){

        Route::group(['prefix' => 'posts'], function(){
            Route::get('/', [\App\Http\Controllers\Blog\PostController::class, 'index']);
            Route::post('/', [\App\Http\Controllers\Blog\PostController::class, 'store']);
            Route::get('/{post}', [\App\Http\Controllers\Blog\PostController::class, 'show']);
            Route::patch('/{post}', [\App\Http\Controllers\Blog\PostController::class, 'update']);
            Route::delete('/{post}', [\App\Http\Controllers\Blog\PostController::class, 'delete']);
        });



        Route::group(['prefix' => 'categories'], function() {
            Route::get('/', [\App\Http\Controllers\Blog\CategoryController::class, 'index']);
            Route::post('/', [\App\Http\Controllers\Blog\CategoryController::class, 'store']);
            Route::patch('/{category}', [\App\Http\Controllers\Blog\CategoryController::class, 'update']);
            Route::delete('/{category}', [\App\Http\Controllers\Blog\CategoryController::class, 'delete']);
        });

        Route::group(['prefix' => 'tags'], function() {
            Route::get('/', [\App\Http\Controllers\Blog\TagController::class, 'index']);
            Route::post('/', [\App\Http\Controllers\Blog\TagController::class, 'store']);
            Route::patch('/{tag}', [\App\Http\Controllers\Blog\TagController::class, 'update']);
            Route::delete('/{tag}', [\App\Http\Controllers\Blog\TagController::class, 'delete']);
        });

    });

    Route::group(['prefix'=>'images'], function(){
        Route::post('/', [\App\Http\Controllers\ImageController::class, 'store']);
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

