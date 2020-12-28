<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\AuthController;



Route::get('/', [FrontController::class, 'index']);
Route::get('contact', [FrontController::class, 'Contact']);

Route::get('login', [AuthController::class, 'LoginForm'])->name('login');
Route::get('forget-password', [AuthController::class, 'ForgetPassword'])->name('forget-password');
Route::get('reg', [AuthController::class, 'UsersForm'])->name('reg');
Route::post('insert-user', [AuthController::class, 'InsertUser']);
Route::post('check-login', [AuthController::class, 'LoginProccess']);
