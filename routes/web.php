<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});
Route::get('/conferences', function () {
    return view('conferences/index');
});
