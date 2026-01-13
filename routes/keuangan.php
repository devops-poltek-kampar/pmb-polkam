<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Keuangan\DashboardController as KeuanganDashboardController;
use App\Http\Controllers\Keuangan\RegistrasiController as KeuanganRegistrasiController;

Route::get('/dashboard', [KeuanganDashboardController::class, "dashboard"]);
Route::get('/data-pembayaran', [KeuanganRegistrasiController::class, "data_pembayaran"]);
Route::get('/set-status-pembayaran/{nomorRegistrasi}/{status}/{kategori}', [KeuanganRegistrasiController::class, "set_status_registrasi"]);
Route::get('/{nomorRegistrasi}/{status}', [KeuanganRegistrasiController::class, "set_status_registrasi"]);
// Route::get('/keuangan/login', [AuthController::class, "login_keuangan"]);
// Route::post('/keuangan/auth', [AuthController::class, "auth_keuangan"])->name("auth.login.keuangan");
