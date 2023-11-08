<?php

use Illuminate\Support\Facades\Route;
use Yazdan\Course\App\Http\Controllers\CourseController;

Route::prefix('admin-panel')->name('admin.')->middleware([
    'auth',
    'verified'
])->group(function () {
    Route::resource('courses', CourseController::class);
});

Route::get('/courses', [CourseController::class, 'courses'])->name('courses');
Route::get('/courses/{course:slug}', [CourseController::class, 'courseShow'])->name('courses.show');
