<?php

use Illuminate\Support\Facades\Route;
use Yazdan\Discount\App\Http\Controllers\DiscountController;

Route::prefix('admin-panel')->name('admin.')->middleware([
    'auth',
    'verified'
])->group(function(){

    providerGetRoute('/discounts',DiscountController::class,'index','discounts.index');

    Route::post("/discounts",[DiscountController::class,'store'])->name("discounts.store");



    Route::delete("/discounts/{discount}", [DiscountController::class,'destroy'])->name("discounts.destroy");
    Route::get("/discounts/{discount}/edit", [DiscountController::class,'edit'])->name("discounts.edit");
    Route::put("/discounts/{discount}", [DiscountController::class,'update'])->name("discounts.update");

});

Route::group([
    'middleware' => [
        'auth',
        'verified'
    ]
], function () {

    Route::post("/discounts/check", [DiscountController::class,'check'])->name("discounts.check");
    Route::post("/discounts/{course:slug}/digitalCodeCheck", [DiscountController::class,'digitalCodeCheck'])->name("discounts.digitalCodeCheck");

});

