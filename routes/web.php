<?php

use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::prefix('courses')->group(function () {
    Route::get('/', [CourseController::class, 'index'])
        ->name('courses.index');
    Route::get('/create', [CourseController::class, 'create'])
        ->name('courses.create');
    Route::get('/{id}', [CourseController::class, 'show'])
        ->name('courses.show');
    Route::get('/{id}/edit', [CourseController::class, 'edit'])
        ->name('courses.edit');
    Route::post('/', [CourseController::class, 'store'])
        ->name('courses.store');
    Route::patch('/{id}', [CourseController::class, 'update'])
        ->name('courses.update');
    Route::delete('/{id}', [CourseController::class, 'destroy'])
        ->name('courses.destroy');
});
