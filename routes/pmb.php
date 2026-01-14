<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PMB\DashboardController as PMBDashboardController;
use App\Http\Controllers\PMB\BerkasPernyataanController as PMBBerkasPernyataanController;
use App\Http\Controllers\PMB\CalonMahasiswaController;
use App\Http\Controllers\PMB\GelombangController;
use App\Http\Controllers\PMB\JalurController;
use App\Http\Controllers\PMB\LulusSeleksiController;
use App\Http\Controllers\PMB\PengajuanBerkasController;
use App\Http\Controllers\PMB\PindahJalurController;
use App\Http\Controllers\PMB\PortalRegistrasiController;
use App\Http\Controllers\PMB\UjianCBTController;
use App\Http\Controllers\PMB\WawancaraController;
use App\Http\Controllers\Web\BeritaController;
use App\Http\Middleware\PMBMiddleware;

Route::middleware(PMBMiddleware::class);

Route::get('/dashboard', [PMBDashboardController::class, 'dashboard']);

Route::get('/calon-mahasiswa', [CalonMahasiswaController::class, "index"]);
Route::get('/calon-mahassiwa/acc-formulir/{nomorRegistrasi}', [CalonMahasiswaController::class, "acc_formulir"]);
Route::get('/calon-mahasiswa/detail-registrasi/{registrasiId}', [CalonMahasiswaController::class, "detail_registrasi"]);

Route::get('/ujian-cbt', [UjianCBTController::class, "index"]);
Route::get('/ujian-cbt/lulus/{ujianCbtId}', [UjianCBTController::class, "lulus"]);

Route::get('/pindah-jalur', [PindahJalurController::class, "index"]);
Route::post('/pindah-jalur', [PindahJalurController::class, "pindah_jalur"]);

Route::get('/wawancara', [WawancaraController::class, 'index']);
Route::get('/wawancara/lulus/{wawancaraId}', [WawancaraController::class, "lulus"]);

Route::get('/pengajuan-berkas', [PengajuanBerkasController::class, "index"]);
Route::get('/pengajuan-berkas/detail/{pengajuanBerkasId}', [PengajuanBerkasController::class, "detail"]);
Route::get('/pengajuan-berkas/lulus/{pengajuanBerkasId}', [PengajuanBerkasController::class, "lulus"]);
Route::post('/pengajuan-berkas/lulus', [PengajuanBerkasController::class, "lulus"]);
Route::get('/pengajuan-berkas/accept-berkas/{berkasId}', [PengajuanBerkasController::class, "accept_berkas"]);
Route::post('/pengajuan-berkas/reject', [PengajuanBerkasController::class, "reject_berkas"]);

Route::get('/gelombang', [GelombangController::class, "gelombang"]);
Route::get('/gelombang/tambah', [GelombangController::class, "form_tambah_gelombang"]);
Route::post('/gelombang/create', [GelombangController::class, "create_gelombang"]);

Route::get('/jalur', [JalurController::class, "jalur"]);
Route::get('/jalur/tambah', [JalurController::class, 'form_tambah_jalur']);
Route::post('/jalur/create', [JalurController::class, "create_jalur"]);
Route::get('/lulus-seleksi', [LulusSeleksiController::class, "index"]);

Route::get('/portal-registrasi', [PortalRegistrasiController::class, "index"]);
Route::post('/portal-registrasi/create', [PortalRegistrasiController::class, "create_portal"]);
Route::get('/portal-registrasi/tambah', [PortalRegistrasiController::class, "form_tambah_portal"]);
Route::get('/portal-registrasi/dokumen-jalur/{jalurMasukId}', [PortalRegistrasiController::class, "dokumen_jalur"]);
Route::post('/portal-registrasi/dokumen-jalur/create', [PortalRegistrasiController::class, "create_dokumen"]);
Route::get('/portal-registrasi/program-studi/{jalurMasukId}', [PortalRegistrasiController::class, "program_studi"]);
Route::post('/portal-registrasi/program-studi/create', [PortalRegistrasiController::class, "create_prodi_jalur"]);

Route::get('/master-web/berita', [BeritaController::class, "index"]);
Route::get('/master-web/berita/tambah', [BeritaController::class, "tambah"]);
Route::post('/master-web/berita/create', [BeritaController::class, "create"]);
Route::get('/master-web/berita/edit/{beritaId}', [BeritaController::class, "form_edit_berita"]);
Route::post('/master-web/berita/edit', [BeritaController::class, "edit_berita"]);

Route::get('/berkas-pernyataan', [PMBBerkasPernyataanController::class, "index"]);
