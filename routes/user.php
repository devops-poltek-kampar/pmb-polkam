<?php

use App\Http\Controllers\Maba\BerkasPernyataanController;
use App\Http\Controllers\Maba\DashboardController;
use App\Http\Controllers\Maba\PengumumanController;
use App\Http\Controllers\Maba\RegistrasiController;
use App\Http\Controllers\Maba\RegistrasiUlangController;
use App\Http\Controllers\Maba\PengajuanBerkasController;
use Illuminate\Support\Facades\Route;

// Route::prefix('user')->group(function () {

Route::get('/dashboard', [DashboardController::class, "index"]);
// Route::get('/user/form-registrasi', [RegistrasiController::class, "form_registrasi"]);
Route::get('/form-registrasi', [RegistrasiController::class, "form_registrasi"]);
Route::get('/data-registrasi', [RegistrasiController::class, "data_registrasi"]);
Route::post("/save-registrasi", [RegistrasiController::class, "save_registrasi"]);

Route::get('/pengajuan-berkas', [PengajuanBerkasController::class, "index"]);
Route::post('/pengajuan-berkas/upload-dokumen-registrasi', [PengajuanBerkasController::class, "upload_dokumen_registrasi"])->name('user.upload.dokumen');
Route::post('/pengajuan-berkas/edit-berkas', [PengajuanBerkasController::class, "edit_berkas"])->name('user.pengajuan-berkas.edit');

Route::get('/registrasi-ulang', [RegistrasiUlangController::class, "index"]);
Route::post('/registrasi-ulang/upload-bukti-registrasi-ulang', [RegistrasiUlangController::class, "upload_bukti_pembayaran_daftar_ulang"])->name("user.registrasi-ulang.upload");

Route::get('/upload-berkas', [RegistrasiController::class, "upload_berkas"]);

Route::get('/detail-registrasi/{registrasiId}', [RegistrasiController::class, "detail_registrasi"]);
Route::get('/form-upload-bukti-registrasi/{nomorRegistrasi}', [RegistrasiController::class, "form_upload_bukti_registrasi"]);
Route::post('/upload-bukti-pembayaran-registrasi', [RegistrasiController::class, "upload_bukti_pembayaran_registrasi"]);

Route::get('/berkas-pernyataan', [BerkasPernyataanController::class, 'index']);
Route::post('/berkas-pernyataan/upload', [BerkasPernyataanController::class, 'upload_berkas']);

Route::get('/pengumuman', [PengumumanController::class, "index"]);
// });
