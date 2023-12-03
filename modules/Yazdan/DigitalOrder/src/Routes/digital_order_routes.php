<?php

use Illuminate\Support\Facades\Route;
use Yazdan\Order\App\Http\Controllers\DigitalOrderController;

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/digital/checkout', [DigitalOrderController::class, 'checkout'])->name('checkout');

});

// Home
Route::group([
    'middleware' => [
        'auth',
        'verified'
    ]
], function () {
    // Profile
    providerGetRoute('/users/orders',DigitalOrderController::class,'orders','users.orders');
});
