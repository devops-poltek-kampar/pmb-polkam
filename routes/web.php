<?php

use App\Http\Controllers\Akademik\BerkasPernyataanController;
use App\Http\Controllers\Akademik\DashboardController as AkademikDashboardController;
// use App\Http\Controllers\Auth\AuthController;
// use App\Http\Controllers\Keuangan\DashboardController as KeuanganDashboardController;
// use App\Http\Controllers\Keuangan\RegistrasiController as KeuanganRegistrasiController;
// use App\Http\Controllers\Maba\BerkasPernyataanController as MabaBerkasPernyataanController;
// use App\Http\Controllers\Maba\DashboardController;
// use App\Http\Controllers\Maba\PengajuanBerkasController as MabaPengajuanBerkasController;
// use App\Http\Controllers\Maba\PengumumanController;
// use App\Http\Controllers\PMB\DashboardController as PMBDashboardController;
// use App\Http\Controllers\Maba\RegistrasiController;
// use App\Http\Controllers\Maba\RegistrasiUlangController;
// use App\Http\Controllers\PMB\BerkasPernyataanController as PMBBerkasPernyataanController;
// use App\Http\Controllers\PMB\CalonMahasiswaController;
// use App\Http\Controllers\PMB\GelombangController;
// use App\Http\Controllers\PMB\JalurController;
// use App\Http\Controllers\PMB\LulusSeleksiController;
// use App\Http\Controllers\PMB\PengajuanBerkasController;
// use App\Http\Controllers\PMB\PindahJalurController;
// use App\Http\Controllers\PMB\PortalRegistrasiController;
// use App\Http\Controllers\PMB\RegistrasiController as PMBRegistrasiController;
// use App\Http\Controllers\PMB\SystemSettingController;
// use App\Http\Controllers\PMB\UjianCBTController;
// use App\Http\Controllers\PMB\WawancaraController;
// use App\Http\Controllers\Web\BeritaController;
use App\Http\Controllers\Web\WebController;
use Illuminate\Support\Facades\Route;

// Route::get('/', [WebController::class, "index"]);
Route::get('/', function () {
    echo bcrypt("123456");
});


Route::get('/profile', [WebController::class, "profile"]);
Route::get('/info-pmb', [WebController::class, "info_pmb"]);
Route::get('/jadwal-biaya', [WebController::class, "jadwal_biaya"]);
Route::get('/berita', [WebController::class, "berita"]);
Route::get('/berita/{slug}', [WebController::class, "detail_berita"]);

Route::get('/akademik/dashboard', [AkademikDashboardController::class, 'index']);
Route::get('/akademik/berkas-pernyataan', [BerkasPernyataanController::class, "index"]);
Route::get('/akademik/berkas-pernyataan/{status}/{berkasId}', [BerkasPernyataanController::class, "approve_berkas"]);

// Route::get('/pmb/login', [AuthController::class, "login_pmb"]);