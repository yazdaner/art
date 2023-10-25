<?php

use Illuminate\Support\Facades\Route;
use Yazdan\Common\App\Http\Controllers\CommonController;

Route::prefix('admin-panel')->name('admin.')->middleware([
    'auth',
    'verified'
])->group(function () {
    Route::post('/editor/upload', [CommonController::class, 'postImagesUpload'])->name('editor-upload');
});
