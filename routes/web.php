<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
//use App\Http\Controllers\FrontController;



//Route::get('/', [FrontController::class, 'index']);
//Route::get('contact', [FrontController::class, 'Contact']);
Route::get('login', [AuthController::class, 'LoginForm'])->name('login');
Route::post('check-login', [AuthController::class, 'LoginProccess']);

Route::middleware(['auth'])->group(function () {
  Route::match(['get', 'post'],'logout', [AuthController::class, 'LogOut'])->name('logout');
  //Route::get('logout', [AuthController::class, 'LogOut'])->name('logout');
  Route::get('forget-password', [AuthController::class, 'ForgetPassword'])->name('forget-password');
  Route::post('insert-user', [AuthController::class, 'InsertUser']);

  Route::get('dashboard', [AdminController::class, 'Dashboard'])->name('dashboard');
  Route::get('new-users', [AdminController::class, 'NewUsers_form'])->name('new-users');
  Route::get('all-users', [AdminController::class, 'getUsers'])->name('all-users');
  Route::put('edit-user/{id}', [AdminController::class, 'EditUser'])->name('edit-user');
  Route::delete('delete-user/{id}', [AdminController::class, 'DeleteUser'])->name('delete-user');
});
