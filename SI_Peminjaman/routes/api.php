<?php
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\AuthController;

Route::get('/karyawans', [KaryawanController::class, 'index']);
Route::post('/karyawans', [KaryawanController::class, 'store']);
Route::get('/karyawans/{id}', [KaryawanController::class, 'show']);
Route::put('/karyawans/{id}', [KaryawanController::class, 'update']);
Route::delete('/karyawans/{id}', [KaryawanController::class, 'destroy']);

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);
