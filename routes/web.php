<?php

use App\Http\Controllers\Admin\ConferenceController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocaleController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);
Route::get('/customer', [CustomerController::class, 'index']);
Route::get('/customer/register', [CustomerController::class, 'create']);
Route::post('/customer', [CustomerController::class, 'store']);
Route::get('/customer/conference/{conference}', [CustomerController::class, 'show']);
Route::post('/locale', LocaleController::class)->name('locale.change');
Route::get('/employee', [EmployeeController::class, 'index']);
Route::get('/employee/conference/{conference}', [EmployeeController::class, 'show']);
Route::get('admin', function () {
    return view('admin');
});
Route::get('users', [UsersController::class, 'index']);
Route::put('users/{user}', [UsersController::class, 'update']);
Route::delete('users/{user}/delete', [UsersController::class, 'destroy']);
Route::get('users/{user}/edit', [UsersController::class, 'edit']);
Route::get('conferences', [ConferenceController::class, 'index']);
Route::get('conferences/create', [ConferenceController::class, 'create']);
Route::post('conferences', [ConferenceController::class, 'store']);
Route::get('conferences/{conference}/edit', [ConferenceController::class, 'edit']);
Route::put('conferences/{conference}', [ConferenceController::class, 'update']);
Route::delete('conferences/{conference}/delete', [ConferenceController::class, 'destroy']);
