<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\StudentGroupController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

// Attendance Routes
Route::get('/attendances', [AttendanceController::class, 'index']);
Route::post('/attendances', [AttendanceController::class, 'store']);
Route::get('/attendances/{id}', [AttendanceController::class, 'show']);
Route::put('/attendances/{id}', [AttendanceController::class, 'update']);
Route::delete('/attendances/{id}', [AttendanceController::class, 'destroy']);
Route::get('/attendances/student/{studentId}', [AttendanceController::class, 'getByStudent']);
Route::get('/attendances/group/{groupId}', [AttendanceController::class, 'getByGroup']);
Route::get('/attendances-statistics', [AttendanceController::class, 'statistics']);

// Student Group Routes
Route::get('/groups', [StudentGroupController::class, 'index']);
Route::post('/groups', [StudentGroupController::class, 'store']);
Route::get('/groups/{id}', [StudentGroupController::class, 'show']);
Route::put('/groups/{id}', [StudentGroupController::class, 'update']);
Route::delete('/groups/{id}', [StudentGroupController::class, 'destroy']);
Route::get('/groups/{id}/attendances', [StudentGroupController::class, 'withAttendances']);
