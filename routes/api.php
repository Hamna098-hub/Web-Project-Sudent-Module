<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Student\StudentAuthController;
use App\Http\Controllers\Student\StudentAttendanceController;
use App\Http\Controllers\Student\StudentCourseController;
use App\Http\Controllers\Student\StudentGradeController;

Route::post('student/login',    [StudentAuthController::class, 'login']);
Route::post('student/register', [StudentAuthController::class, 'register']);
Route::post('student/logout',   [StudentAuthController::class, 'logout']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('student/courses',       [StudentCourseController::class, 'index']);
    Route::get('student/courses/{id}',  [StudentCourseController::class, 'show']);
    Route::get('student/grades',        [StudentGradeController::class, 'index']);
    Route::get('student/grades/{id}',   [StudentGradeController::class, 'show']);
    Route::get('student/attendance',    [StudentAttendanceController::class, 'index']);
    Route::get('student/attendance/{id}', [StudentAttendanceController::class, 'show']);
});