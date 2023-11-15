<?php

use Illuminate\Support\Facades\Route;
use Yazdan\Product\App\Http\Controllers\ProductController;

Route::prefix('admin-panel')->name('admin.')->middleware([
    'auth',
    'verified'
])->group(function () {

    // products
    Route::resource('products', ProductController::class);

    // gallery
    Route::get('products/{product}/gallery',[ProductController::class,'gallery'])->name('products.gallery');
    Route::post('products/{product}/addImageGallery',[ProductController::class,'addImagesGallery'])->name('products.addImagesGallery');
    Route::get('galleries/{gallery}/delete',[ProductController::class,'deleteImageGallery'])->name('gallery.delete');

    // variation
    Route::resource('variations', VariationController::class);

});
