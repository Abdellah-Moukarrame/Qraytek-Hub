<?php

use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::get('/register_teacher', [RegisterController::class, 'index'])->name('register_teacher');
/// Socialite Auth
Route::controller(GoogleController::class)->group(function () {
    Route::get('/auth/callback/{provider}', 'callback')->name('google.callback');
    Route::get('/auth/redirect/{provider}', 'redirect')->name('google.redirect');
});
