<?php

use App\Http\Controllers\Admin\ConferenceController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocaleController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::group(['middleware' => ['role:admin']], function () {
    Route::get('admin', function () {return view('admin');})->name('admin');
    Route::get('users', [UsersController::class, 'index'])->name('users');
    Route::put('users/{user}', [UsersController::class, 'update'])->name('users.update');
    Route::delete('users/{user}/delete', [UsersController::class, 'destroy'])->name('users.destroy');
    Route::get('users/{user}/edit', [UsersController::class, 'edit'])->name('users.edit');
    Route::get('conferences', [ConferenceController::class, 'index'])->name('conferences');
    Route::get('conferences/create', [ConferenceController::class, 'create'])->name('conferences.create');
    Route::post('conferences', [ConferenceController::class, 'store'])->name('conferences.store');
    Route::get('conferences/{conference}/edit', [ConferenceController::class, 'edit'])->name('conferences.edit');
    Route::put('conferences/{conference}', [ConferenceController::class, 'update'])->name('conferences.update');
    Route::delete('conferences/{conference}/delete', [ConferenceController::class, 'destroy'])->name('conferences.destroy');
});
Route::get('/customer', [CustomerController::class, 'index'])->name('customer');
Route::get('/customer/register', [CustomerController::class, 'create']);
Route::post('/customer', [CustomerController::class, 'store']);
Route::get('/customer/conference/{conference}', [CustomerController::class, 'show']);
Route::post('/locale', LocaleController::class)->name('locale.change');
Route::get('/employee', [EmployeeController::class, 'index']);
Route::get('/employee/conference/{conference}', [EmployeeController::class, 'show']);

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'register']);
Route::post('logout', [LoginController::class, 'logout']);
Route::get('login', [LoginController::class, 'login'])->middleware('guest');
Route::post('login', [LoginController::class, 'authenticate']);

