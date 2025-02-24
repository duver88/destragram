<?php

use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('principal');
});

Route::get('/crear-cuentaa', [RegisterController::class, 'index'])->name('register');
Route::post('/crear-cuentaa', [RegisterController::class, 'store'])->name('crearcuneta');




