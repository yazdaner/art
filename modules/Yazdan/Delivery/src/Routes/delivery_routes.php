<?php

use Illuminate\Support\Facades\Route;
use Yazdan\Delivery\App\Http\Controllers\DeliveryController;


Route::prefix('admin-panel')->name('admin.')->middleware([
    'auth',
    'verified'
])->group(function () {
    providerGetRoute('/delivery',DeliveryController::class,'edit','delivery.edit');
    Route::put("/delivery/{delivery}", [DeliveryController::class,'update'])->name("delivery.update");
});
