<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/auth/google', [AuthController::class, "google_auth"]);
Route::get('/auth/google/callback', [AuthController::class, "google_auth_callback"]);
Route::get('/auth/forgot-password', [AuthController::class, "forgot_password"]);
Route::post('/auth/forgot-password', [AuthController::class, 'send_email']);
Route::get("/registrasi", [AuthController::class, "registrasi"]);
Route::get('/login', [AuthController::class, "login"]);
Route::get('/logout', [AuthController::class, "logout"]);
Route::post("/register", [AuthController::class, "register"])->name("auth.register");
Route::post("/auth", [AuthController::class, "auth"])->name("auth.login");
Route::get('/verified-account/{id}', [AuthController::class, "verified"]);

Route::post('/auth/forgot-password/reset', [AuthController::class, "reset_password"]);
Route::get('/auth/forgot-password/token', [AuthController::class, 'form_token_password']);
Route::post('/auth/forgot-password/token', [AuthController::class, 'check_token']);

Route::get('/auth/forgot-password/{userId}', [AuthController::class, "form_reset_password"])->name('auth.forgot-password');
