<?php

use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\StudentMiddleware;
use Illuminate\Support\Facades\Route;
// Admin Controllers
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Admin\TeacherController as AdminTeacher;
use App\Http\Controllers\Admin\UserController as AdminUser;

// Teacher Controllers
use App\Http\Controllers\Teacher\DashboardController as TeacherDashboard;
use App\Http\Controllers\Teacher\CourseController as TeacherCourse;
use App\Http\Controllers\Teacher\SessionController as TeacherSession;
use App\Http\Controllers\Teacher\StudentController as TeacherStudent;
use App\Http\Controllers\Teacher\MessageController as TeacherMessage;

// Student Controllers
use App\Http\Controllers\Student\DashboardController as StudentDashboard;
use App\Http\Controllers\Student\CourseController as StudentCourse;
use App\Http\Controllers\Student\BookingController as StudentBooking;
use App\Http\Controllers\Student\TeacherController as StudentTeacher;
use App\Http\Controllers\Student\ProgressController as StudentProgress;
use App\Http\Controllers\Student\MessageController as StudentMessage;


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/login', [LoginController::class, 'index'])->name('login.index');
Route::post('/login', [LoginController::class, 'login'])->name('login.create');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
Route::get('/register/teacher', [RegisterController::class, 'index'])->name('register.teacher');
/// Socialite Auth
Route::controller(GoogleController::class)->group(function () {
    Route::get('/auth/callback/{provider}', 'callback')->name('google.callback');
    Route::get('/auth/redirect/{provider}', 'redirect')->name('google.redirect');
});

// routes/web.php

// ─── Admin ────────────────────────────────────────────
Route::prefix('admin')->name('admin.')->middleware(['auth', AdminMiddleware::class])->group(function () {
    Route::get('/dashboard', [AdminDashboard::class, 'index'])->name('dashboard');

    Route::get('/teachers', [AdminTeacher::class, 'index'])->name('teachers.index');
    Route::get('/teachers/{teacher}', [AdminTeacher::class, 'show'])->name('teachers.show');
    Route::post('/teachers/{teacher}/approve', [AdminTeacher::class, 'approve'])->name('teachers.approve');
    Route::post('/teachers/{teacher}/reject', [AdminTeacher::class, 'reject'])->name('teachers.reject');
    Route::delete('/teachers/{teacher}', [AdminTeacher::class, 'destroy'])->name('teachers.destroy');

    Route::get('/users', [AdminUser::class, 'index'])->name('users.index');
    Route::get('/users/{user}', [AdminUser::class, 'show'])->name('users.show');
    Route::delete('/users/{user}', [AdminUser::class, 'destroy'])->name('users.destroy');
});

// ─── Teacher ──────────────────────────────────────────
Route::prefix('teacher')->name('teacher.')->group(function () {
    Route::get('/dashboard', [TeacherDashboard::class, 'index'])->name('dashboard');

    Route::get('/courses', [TeacherCourse::class, 'index'])->name('courses.index');
    Route::get('/courses/create', [TeacherCourse::class, 'create'])->name('courses.create');
    Route::post('/courses', [TeacherCourse::class, 'store'])->name('courses.store');
    Route::get('/courses/{course}', [TeacherCourse::class, 'show'])->name('courses.show');
    Route::get('/courses/{course}/edit', [TeacherCourse::class, 'edit'])->name('courses.edit');
    Route::put('/courses/{course}', [TeacherCourse::class, 'update'])->name('courses.update');
    Route::delete('/courses/{course}', [TeacherCourse::class, 'destroy'])->name('courses.destroy');

    Route::get('/sessions', [TeacherSession::class, 'index'])->name('sessions.index');
    Route::get('/sessions/create', [TeacherSession::class, 'create'])->name('sessions.create');
    Route::post('/sessions', [TeacherSession::class, 'store'])->name('sessions.store');

    Route::get('/students', [TeacherStudent::class, 'index'])->name('students.index');
    Route::get('/students/{student}', [TeacherStudent::class, 'show'])->name('students.show');

    Route::get('/messages', [TeacherMessage::class, 'index'])->name('messages.index');
});

// ─── Student ──────────────────────────────────────────
Route::prefix('student')->name('student.')->middleware(['auth', StudentMiddleware::class])->group(function () {
    Route::get('/dashboard', [StudentDashboard::class, 'index'])->name('dashboard');

    Route::get('/courses', [StudentCourse::class, 'index'])->name('courses.index');
    Route::get('/courses/{course}', [StudentCourse::class, 'show'])->name('courses.show');

    Route::get('/teachers', [StudentTeacher::class, 'index'])->name('teachers.index');
    Route::get('/teachers/{teacher}', [StudentTeacher::class, 'show'])->name('teachers.show');

    Route::get('/bookings', [StudentBooking::class, 'index'])->name('bookings.index');
    Route::get('/bookings/create', [StudentBooking::class, 'create'])->name('bookings.create');
    Route::post('/bookings', [StudentBooking::class, 'store'])->name('bookings.store');
    Route::get('/bookings/{booking}', [StudentBooking::class, 'show'])->name('bookings.show');
    Route::delete('/bookings/{booking}', [StudentBooking::class, 'destroy'])->name('bookings.destroy');

    Route::get('/progress', [StudentProgress::class, 'index'])->name('progress.index');
    Route::get('/messages', [StudentMessage::class, 'index'])->name('messages.index');
});
