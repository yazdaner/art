<?php

use Illuminate\Support\Facades\Route;
use Yazdan\Cart\App\Http\Controllers\CartController;


Route::prefix('cart')->name('cart.')->group(function () {


    Route::get('/', [CartController::class, 'index'])->name('index');
    Route::post('/add', [CartController::class, 'add'])->name('add');
    Route::get('/remove/{rowId}', [CartController::class, 'remove'])->name('remove');
    Route::put('/update', [CartController::class, 'update'])->name('update');
    Route::get('/clear', [CartController::class, 'clear'])->name('clear');

    Route::get('/buy', [CartController::class, 'buy'])->middleware(['auth', 'verified'])->name('buy');

});
