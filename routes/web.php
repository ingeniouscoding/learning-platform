<?php

use App\Http\Controllers\Student\AnswerController;
use App\Http\Controllers\Student\CourseController as StudentCourseController;
use App\Http\Controllers\Student\LessonController as StudentLessonController;
use App\Http\Controllers\Teacher\CourseController as TeacherCourseController;
use App\Http\Controllers\Teacher\LessonController as TeacherLessonController;
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

Route::middleware(['auth:sanctum'])->prefix('teacher/courses')->group(function () {
    Route::get('/', [TeacherCourseController::class, 'index'])
        ->name('teacher.courses.index');
    Route::get('/create', [TeacherCourseController::class, 'create'])
        ->name('teacher.courses.create');
    Route::get('/{id}', [TeacherCourseController::class, 'show'])
        ->name('teacher.courses.show');
    Route::get('/{id}/edit', [TeacherCourseController::class, 'edit'])
        ->name('teacher.courses.edit');
    Route::post('/', [TeacherCourseController::class, 'store'])
        ->name('teacher.courses.store');
    Route::patch('/{id}', [TeacherCourseController::class, 'update'])
        ->name('teacher.courses.update');
    Route::delete('/{id}', [TeacherCourseController::class, 'destroy'])
        ->name('teacher.courses.destroy');
});

Route::middleware(['auth:sanctum'])->prefix('teacher/lessons')->group(function () {
    Route::get('/create', [TeacherLessonController::class, 'create'])
        ->name('teacher.lessons.create');
    Route::get('/{id}', [TeacherLessonController::class, 'show'])
        ->name('teacher.lessons.show');
    Route::get('/{id}/edit', [TeacherLessonController::class, 'edit'])
        ->name('teacher.lessons.edit');
    Route::post('/', [TeacherLessonController::class, 'store'])
        ->name('teacher.lessons.store');
    Route::patch('/{id}', [TeacherLessonController::class, 'update'])
        ->name('teacher.lessons.update');
    Route::delete('/{id}', [TeacherLessonController::class, 'destroy'])
        ->name('teacher.lessons.destroy');
});

Route::middleware(['auth:sanctum'])->prefix('courses')->group(function () {
    Route::get('/', [StudentCourseController::class, 'index'])
        ->name('student.courses.index');
    Route::get('/{id}', [StudentCourseController::class, 'show'])
        ->name('student.courses.show');
});

Route::middleware(['auth:sanctum'])->prefix('lessons')->group(function () {
    Route::get('/{id}', [StudentLessonController::class, 'show'])
        ->name('student.lessons.show');
});

Route::middleware(['auth:sanctum'])->prefix('answers')->group(function () {
    Route::get('/{id}', [AnswerController::class, 'show'])
        ->name('student.answers.show');
});
