<?php

use Illuminate\Support\Facades\Route;
use Yazdan\Order\App\Http\Controllers\OrderController;

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/checkout', [OrderController::class, 'checkout'])->name('checkout');

});
