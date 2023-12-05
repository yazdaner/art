<?php

use Illuminate\Support\Facades\Route;
use Yazdan\DigitalOrder\App\Http\Controllers\DigitalOrderController;

// Front
Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/digital-checkout/{course:slug}', [DigitalOrderController::class, 'digitalCheckout'])->name('digital.checkout');
    Route::get('/digital-buy/{course:slug}', [DigitalOrderController::class, 'buy'])->middleware(['auth', 'verified'])->name('digital.buy');

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


// Admin
Route::prefix('admin-panel')->name('admin.')->middleware([
    'auth',
    'verified'
])->group(function () {
    providerGetRoute('/orders',DigitalOrderController::class,'index','orders.index');
    Route::get('orders/{order}/edit', [DigitalOrderController::class, 'edit'])->name('orders.edit');
    Route::patch('orders/{order}/update', [DigitalOrderController::class, 'update'])->name('orders.update');
});
