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

Route::prefix('student')->name('student.')->group(function () {

    // Dashboard
    Route::get('/dashboard', fn() => view('student.dashboard'))->name('dashboard');

    // Courses
    Route::get('/courses', fn() => view('student.courses.index'))->name('courses.index');
    Route::get('/courses/{course}', fn() => view('student.courses.show'))->name('courses.show');

    // Teachers
    Route::get('/teachers', fn() => view('student.teachers.index'))->name('teachers.index');
    Route::get('/teachers/{teacher}', fn() => view('student.teachers.show'))->name('teachers.show');

    // Bookings
    Route::get('/bookings', fn() => view('student.bookings.index'))->name('bookings.index');
    Route::get('/bookings/create', fn() => view('student.bookings.create'))->name('bookings.create');
    Route::get('/bookings/{booking}', fn() => view('student.bookings.show'))->name('bookings.show');

    // Progress
    Route::get('/progress', fn() => view('student.progress.index'))->name('progress.index');

    // Messages
    Route::get('/messages', fn() => view('student.messages.index'))->name('messages.index');

});
