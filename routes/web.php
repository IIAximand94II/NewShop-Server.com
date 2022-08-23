<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

//Route::group(['prefix' => 'admin'], function() {
//    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
//
//    Route::group(['prefix' => 'category'], function(){
//        Route::get('/', [CategoryController::class, 'index'])->name('category.index');
//        Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
//        Route::post('/store', [CategoryController::class, 'store'])->name('category.store');
//        Route::get('/{category}', [CategoryController::class, 'show'])->name('category.show');
//        Route::get('/{category}/edit', [CategoryController::class, 'edit'])->name('category.edit');
//        Route::patch('/{category}', [CategoryController::class, 'update'])->name('category.update');
//        Route::delete('/{category}', [CategoryController::class, 'delete'])->name('category.delete');
//    });
//
//    Route::group(['prefix' => 'tag'], function(){
//        Route::get('/', [TagController::class, 'index'])->name('tag.index');
//        Route::get('/create', [TagController::class, 'create'])->name('tag.create');
//        Route::post('/store', [TagController::class, 'store'])->name('tag.store');
//        Route::get('/{tag}', [TagController::class, 'show'])->name('tag.show');
//        Route::get('/{tag}/edit', [TagController::class, 'edit'])->name('tag.edit');
//        Route::patch('/{tag}', [TagController::class, 'update'])->name('tag.update');
//        Route::delete('/{tag}', [TagController::class, 'delete'])->name('tag.delete');
//    });
//
//    Route::group(['prefix' => 'color'], function(){
//        Route::get('/', [ColorController::class, 'index'])->name('color.index');
//        Route::get('/create', [ColorController::class, 'create'])->name('color.create');
//        Route::post('/store', [ColorController::class, 'store'])->name('color.store');
//        Route::get('/{color}', [ColorController::class, 'show'])->name('color.show');
//        Route::get('/{color}/edit', [ColorController::class, 'edit'])->name('color.edit');
//        Route::patch('/{color}', [ColorController::class, 'update'])->name('color.update');
//        Route::delete('/{color}/delete', [ColorController::class, 'delete'])->name('color.delete');
//    });
//
//    Route::group(['prefix' => 'size'], function(){
//        Route::get('/', [SizeController::class, 'index'])->name('size.index');
//        Route::get('/create', [SizeController::class, 'create'])->name('size.create');
//        Route::post('/store', [SizeController::class, 'store'])->name('size.store');
//        Route::get('/{size}', [SizeController::class, 'show'])->name('size.show');
//        Route::get('/{size}/edit', [SizeController::class, 'edit'])->name('size.edit');
//        Route::patch('/{size}', [SizeController::class, 'update'])->name('size.update');
//        Route::delete('/{size}', [SizeController::class, 'delete'])->name('size.delete');
//    });
//
//    Route::group(['prefix' => 'user'], function(){
//        Route::get('/', [UserController::class, 'index'])->name('user.index');
//        Route::get('/create', [UserController::class, 'create'])->name('user.create');
//        Route::post('/store', [UserController::class, 'store'])->name('user.store');
//        Route::get('/{user}', [UserController::class, 'show'])->name('user.show');
//        Route::get('/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
//        Route::patch('/{user}', [UserController::class, 'update'])->name('user.update');
//        Route::delete('/{user}', [UserController::class, 'delete'])->name('user.delete');
//    });
//
//    Route::group(['prefix' => 'product'], function(){
//        Route::get('/', [ProductController::class, 'index'])->name('product.index');
//        Route::get('/create', [ProductController::class, 'create'])->name('product.create');
//        Route::post('/store', [ProductController::class, 'store'])->name('product.store');
//        Route::get('/{product}', [ProductController::class, 'show'])->name('product.show');
//        Route::get('/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');
//        Route::patch('/{product}', [ProductController::class, 'update'])->name('product.update');
//        Route::delete('/{product}', [ProductController::class, 'delete'])->name('product.delete');
//    });
//
//    Route::group(['prefix' => 'review'], function(){
//        Route::get('/', [ReviewController::class, 'index'])->name('review.index');
//        Route::get('/{review}', [ReviewController::class, 'show'])->name('review.show');
//    });
//
//    Route::group(['prefix' => 'image'], function(){
//        Route::get('/store', [ImageController::class, 'store'])->name('image.upload');
//    });
//});


Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Admin SPA Dashboard
Route::get('/{page}', [\App\Http\Controllers\MainController::class, 'index'])->where('page', '.*');
