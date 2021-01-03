<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
//use App\Http\Controllers\FrontController;



//Route::get('/', [FrontController::class, 'index']);
//Route::get('contact', [FrontController::class, 'Contact']);
Route::get('login', [AuthController::class, 'LoginForm'])->name('login');
Route::post('check-login', [AuthController::class, 'LoginProccess']);
Route::get('forget-password', [AuthController::class, 'ForgetPassword'])->name('forget-password');

Route::middleware(['auth'])->group(function () {
  Route::match(['get', 'post'],'logout', [AuthController::class, 'LogOut'])->name('logout');
  //Route::get('logout', [AuthController::class, 'LogOut'])->name('logout');

  Route::post('insert-user', [AuthController::class, 'InsertUser']);
  Route::get('dashboard', [AuthController::class, 'Dashboard'])->name('dashboard');
  Route::get('new-users', [AuthController::class, 'NewUsers_form'])->name('new-users');
  Route::get('all-users', [AuthController::class, 'getUsers'])->name('all-users');
  Route::get('edit-user/{id}', [AuthController::class, 'EditUser'])->name('edit-user');
  Route::put('update-user/{id}', [AuthController::class, 'UpdateUser'])->name('update-user');
  Route::put('user-active/{id}', [AuthController::class, 'UserActive'])->name('user-active');
  Route::put('user-inactive/{id}', [AuthController::class, 'UserInActive'])->name('user-inactive');
  Route::delete('delete-user/{id}', [AuthController::class, 'DeleteUser'])->name('delete-user');
  Route::get('password-change/{id}', [AuthController::class, 'PasswordChange'])->name('password-change');
  Route::put('update-password/{id}', [AuthController::class, 'UpdatePassword'])->name('update-password');

  Route::get('app-settings', [AdminController::class, 'AppSettingsForm'])->name('app-settings');
  Route::put('update-app-settings', [AdminController::class, 'UpdateAppSettings'])->name('update-app-settings');
  Route::get('users_log', [AdminController::class, 'getUsersLog'])->name('users_log');
});
