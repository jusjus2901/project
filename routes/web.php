<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\TicketsController;
use App\Http\Controllers\ReportsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrationController;
use App\Http\Middleware\AuthCheck;
use App\Http\Middleware\AlreadyLoggedIn;


// Auth routes
Route::middleware(AlreadyLoggedIn::class)->group(function () {
    Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/', [LoginController::class, 'login'])->name('login.post');
    Route::get('/signup', [RegistrationController::class, 'index'])->name('registration');
    Route::post('/signup', [RegistrationController::class,'register'])->name('registration.post');

    // Forgot Password Routes
    Route::get('/password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('/password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('/password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('/password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');
});
Route::middleware(AuthCheck::class)->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/users', [UsersController::class, 'index'])->name('users');
    Route::get('/tickets', [TicketsController::class, 'index'])->name('tickets');
    Route::get('/reports', [ReportsController::class, 'index'])->name('reports');
});

// Protect logout route with auth middleware
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
