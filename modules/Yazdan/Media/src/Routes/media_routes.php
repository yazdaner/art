<?php

use Illuminate\Support\Facades\Route;
use Yazdan\Media\App\Http\Controllers\MediaController;

Route::get('/media/{media}/downlaod',[MediaController::class,'download'])->name('media.download');





