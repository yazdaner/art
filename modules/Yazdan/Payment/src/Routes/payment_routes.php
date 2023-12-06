<?php

use Illuminate\Support\Facades\Route;
use Yazdan\Payment\App\Http\Controllers\PaymentController;


Route::any('/payment/callback/',[PaymentController::class,'callback'])->name('payment.callback');


Route::prefix('admin-panel')->name('admin.')->middleware([
    'auth',
    'verified'
])->group(function () {
    providerGetRoute('/payments',PaymentController::class,'index','payments.index');
});




// Home
Route::group([
    'middleware' => [
        'auth',
        'verified'
    ]
], function () {
    providerGetRoute('/users/payments',PaymentController::class,'userPayments','users.payments');
});
