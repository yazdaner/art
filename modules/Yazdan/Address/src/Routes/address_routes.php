<?php

use Illuminate\Support\Facades\Route;
use Yazdan\Address\App\Http\Controllers\AddressController;

// Home

Route::group([
    'middleware' => [
        'auth',
        'verified'
    ]
], function () {

    // Profile
    providerGetRoute('/address',AddressController::class,'index','address');
    Route::post('/address', [AddressController::class, 'store'])->name('address.store');
    Route::put('/addresses/{address}', [AddressController::class, 'update'])->name('address.update');
    Route::get('/get-province-cities-list', [AddressController::class, 'getProvinceCitiesList']);

});
