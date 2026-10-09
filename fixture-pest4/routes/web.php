<?php

use App\Http\Controllers\BasketController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::view('/login', 'login')->name('login');

Route::middleware('auth')->group(function () {
    Route::get('/basket', [BasketController::class, 'show'])->name('basket.show');
    Route::post('/basket/coupon', [CouponController::class, 'store'])->name('basket.coupon');
    Route::get('/checkout', [BasketController::class, 'checkout'])->name('checkout');
    Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
    Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');
});
