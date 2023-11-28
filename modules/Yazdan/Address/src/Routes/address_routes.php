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

});
