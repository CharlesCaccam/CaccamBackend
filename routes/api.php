<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;

// Public routes
Route::post('/login', [AuthController::class, 'login']);

// Protected routes
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/dashboard/summary', [DashboardController::class, 'summary']);
    Route::get('/dashboard/enrollment-trends', [DashboardController::class, 'enrollmentTrends']);
    Route::get('/dashboard/course-distribution', [DashboardController::class, 'courseDistribution']);
    Route::get('/dashboard/attendance', [DashboardController::class, 'attendance']);
});