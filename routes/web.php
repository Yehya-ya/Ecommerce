<?php

use App\Http\Controllers\Admin\CartController as AdminCartController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Customer\CartController;
use App\Http\Controllers\Customer\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\AdminCheck;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/home', function () {
        return redirect(route('home'));
    });
    Route::put('/cart/pay/{cart}', [CartController::class, 'pay'])->name('cart.pay');
    Route::delete('/cart/cancel/{cart}', [CartController::class, 'cancel'])->name('cart.cancel');
    Route::resource('/cart', CartController::class)->only(['show', 'update']);
    Route::put('/setting/currency/{user}', [ProfileController::class, 'choiceCurrency'])->name('profile.currency');
    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => AdminCheck::class], function () {
        Route::resource('/category', CategoryController::class)->only(['index', 'create', 'store', 'update', 'edit']);
        Route::resource('/product', ProductController::class)->only(['index', 'create', 'store', 'update', 'edit']);
        Route::resource('/sale', AdminCartController::class)->only(['index']);
        Route::patch('/user/toggle/{user}', [UserController::class, 'toggle']);
        Route::resource('/user', UserController::class)->only(['index', 'create', 'store', 'update', 'edit', 'destroy']);
    });
});
