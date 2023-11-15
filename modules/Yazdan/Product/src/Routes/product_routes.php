<?php

use Illuminate\Support\Facades\Route;
use Yazdan\Product\App\Http\Controllers\ProductController;

Route::prefix('admin-panel')->name('admin.')->middleware([
    'auth',
    'verified'
])->group(function () {

    Route::resource('products', ProductController::class);
    Route::get('products/{product}/editGallery',[ProductController::class,'editGallery'])->name('products.editGallery');
    Route::get('galleries/{gallery}/delete',[ProductController::class,'deleteImageGallery'])->name('gallery.delete');
    Route::post('products/{product}/addImageGallery',[ProductController::class,'addImagesGallery'])->name('products.addImagesGallery');

});
