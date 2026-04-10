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

// routes/web.php

Route::prefix('admin')->name('admin.')->group(function () {

    // Dashboard
    Route::get('/dashboard', fn() => view('admin.dashboard'))->name('dashboard');

    // Teachers
    Route::get('/teachers', fn() => view('admin.teachers.index'))->name('teachers.index');
    Route::get('/teachers/{teacher}', fn() => view('admin.teachers.show'))->name('teachers.show');

    // Users
    Route::get('/users', fn() => view('admin.users.index'))->name('users.index');
    Route::get('/users/{user}', fn() => view('admin.users.show'))->name('users.show');

});
