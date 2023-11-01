<?php

use Illuminate\Support\Facades\Route;

Route::prefix('admin-panel')->name('admin.')->middleware([
    'auth',
    'verified'
])->group(function () {

    Route::resource('products', ProductController::class);

});
