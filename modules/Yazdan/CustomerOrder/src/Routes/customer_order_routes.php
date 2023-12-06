<?php

use Illuminate\Support\Facades\Route;
use Yazdan\CustomerOrder\App\Http\Controllers\CustomerOrderController;

Route::prefix('admin-panel')->name('admin.')->middleware([
    'auth',
    'verified'
])->group(function () {

    providerGetRoute('/customer-order',CustomerOrderController::class,'index','customerOrders.index');

});


// Home
Route::group([
    'middleware' => [
        'auth',
        'verified'
    ]
], function () {
    // Profile
    providerGetRoute('/customer',CustomerOrderController::class,'indexOrder','users.customer.orders');
    Route::get('/customer-order/create',[CustomerOrderController::class,'createOrder'])->name('customer.orders.create');
    Route::post('/customer-order/store',[CustomerOrderController::class,'storeOrder'])->name('customer.orders.store');
});

