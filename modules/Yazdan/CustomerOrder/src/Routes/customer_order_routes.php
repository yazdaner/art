<?php

use Illuminate\Support\Facades\Route;
use Yazdan\CustomerOrder\App\Http\Controllers\CustomerOrderController;

Route::prefix('admin-panel')->name('admin.')->middleware([
    'auth',
    'verified'
])->group(function () {

    Route::resource('sliders', CustomerOrderController::class)->except([
        'index'
    ]);
    providerGetRoute('/sliders',CustomerOrderController::class,'index','sliders.index');
});
