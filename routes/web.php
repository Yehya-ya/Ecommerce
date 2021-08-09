<?php

use App\Http\Controllers\admin\CartController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/home', function(){ return redirect(route('home')); });
    Route::put('/cart/pay/{cart}', [CartController::class, 'pay'])->name('cart.pay');
    Route::delete('/cart/cancel/{cart}', [CartController::class, 'cancel'])->name('cart.cancel');
    Route::resource('/cart', CartController::class)->only(['index','show','update']);
    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'],function () {
        Route::resource('/category', CategoryController::class)->only(['index', 'create', 'store', 'update', 'edit']);
        Route::resource('/product', ProductController::class)->only(['index', 'create', 'store', 'update', 'edit']);
        Route::resource('/sale', CartController::class)->only(['index', 'create', 'store', 'update', 'edit']);
        Route::resource('/user', UserController::class)->only(['index', 'create', 'store', 'update', 'edit']);
    });
});
