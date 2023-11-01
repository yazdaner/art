<?php

use Illuminate\Support\Facades\Route;
use Yazdan\Dashboard\App\Http\Controllers\DashboardController;

Route::prefix('admin-panel')->name('admin.')->middleware([
    'auth',
    'verified'
])->group(function () {
    providerGetRoute('/dashboard',DashboardController::class,'index','dashboard');
});
