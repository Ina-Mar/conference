<?php

use App\Http\Controllers\Admin\ConferenceController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocaleController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::group(['middleware' => ['role:admin']], function () {
    Route::get('admin', function () {return view('admin');})->name('admin');
    Route::get('admin/users', [UsersController::class, 'index'])->name('admin.users');
    Route::put('admin/users/{user}', [UsersController::class, 'update'])->name('admin.users.update');
    Route::delete('admin/users/{user}/delete', [UsersController::class, 'destroy'])->name('admin.users.destroy');
    Route::get('admin/users/{user}/edit', [UsersController::class, 'edit'])->name('admin.users.edit');

    Route::get('admin/conferences', [ConferenceController::class, 'index'])->name('admin.conferences');
    Route::get('admin/conferences/create', [ConferenceController::class, 'create'])->name('admin.conferences.create');
    Route::post('admin/conferences', [ConferenceController::class, 'store'])->name('admin.conferences.store');
    Route::get('admin/conferences/{conference}/edit', [ConferenceController::class, 'edit'])->name('admin.conferences.edit');
    Route::put('admin/conferences/{conference}', [ConferenceController::class, 'update'])->name('admin.conferences.update');
    Route::delete('admin/conferences/{conference}/delete', [ConferenceController::class, 'destroy'])->name('admin.conferences.destroy');
});
Route::get('/conference', [CustomerController::class, 'index'])->name('conference.index');
Route::post('/conference/{conference}', [CustomerController::class, 'store'])->name('conference.store');
Route::get('/conference/{conference}', [CustomerController::class, 'show'])->name('conference.show');

Route::post('/locale', LocaleController::class)->name('locale.change');

Route::get('register', [RegisterController::class, 'create'])->middleware('guest')->name('register');
Route::post('register', [RegisterController::class, 'register']);
Route::post('logout', [LoginController::class, 'logout']);
Route::get('login', [LoginController::class, 'login'])->middleware('guest')->name('login');
Route::post('login', [LoginController::class, 'authenticate']);

