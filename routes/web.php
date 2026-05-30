<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Student\StudentAuthController;
use App\Http\Controllers\StudentDashboardController;
use App\Http\Controllers\StudentCourseController;
use App\Http\Controllers\StudentGradeController;
use App\Http\Controllers\StudentAttendanceController;

Route::get('/', function () {
    return redirect()->route('student.login');
});

Route::prefix('student')->name('student.')->group(function () {

    Route::get('login',     [StudentAuthController::class, 'showLogin'])->name('login');
    Route::post('login',    [StudentAuthController::class, 'login']);
    Route::get('register',  [StudentAuthController::class, 'showRegister'])->name('register');
    Route::post('register', [StudentAuthController::class, 'register']);
    Route::post('logout',   [StudentAuthController::class, 'logout'])->name('logout');

    Route::middleware('auth:student')->group(function () {
        Route::get('dashboard',    [StudentDashboardController::class, 'index'])->name('dashboard');
        Route::get('courses',      [StudentCourseController::class, 'index'])->name('courses');
        Route::get('my-courses',   [StudentCourseController::class, 'myEnrollments'])->name('my-enrollments');
        Route::post('enroll/{id}', [StudentCourseController::class, 'enroll'])->name('enroll');
        Route::post('drop/{id}',   [StudentCourseController::class, 'drop'])->name('drop');
        Route::get('grades',       [StudentGradeController::class, 'index'])->name('grades');
        Route::get('attendance',   [StudentAttendanceController::class, 'index'])->name('attendance');
    });
});