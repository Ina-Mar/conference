<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocaleController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);
Route::get('/customer', [CustomerController::class, 'index']);
Route::get('/customer/register', [CustomerController::class, 'create']);
Route::post('/customer', [CustomerController::class, 'store']);
Route::get('/customer/conference/{conference}', [CustomerController::class, 'show']);
Route::post('/locale', LocaleController::class)->name('locale.change');
