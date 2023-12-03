<?php

use Illuminate\Support\Facades\Route;
use Yazdan\Order\App\Http\Controllers\OrderController;

// Front
Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/checkout', [OrderController::class, 'checkout'])->name('checkout');

});

// Home
Route::group([
    'middleware' => [
        'auth',
        'verified'
    ]
], function () {
    // Profile
    providerGetRoute('/users/orders',OrderController::class,'orders','users.orders');
});


// Admin
Route::prefix('admin-panel')->name('admin.')->middleware([
    'auth',
    'verified'
])->group(function () {
    providerGetRoute('/orders',OrderController::class,'index','orders.index');
});
