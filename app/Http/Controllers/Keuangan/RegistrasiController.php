<?php

namespace App\Http\Controllers\Keuangan;

use App\DataTables\PembayaranDataTables;
use App\Http\Controllers\Controller;
use App\Mail\PembayaranRegistrasiMail;
use App\Mail\PembayaranRegistrasiUlangMail;
use App\Models\PMBBuktiPembayaranModel;
use App\Models\PMBRegistrasiModel;
use App\Services\RegistrasiService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;

class RegistrasiController extends Controller
{
    private RegistrasiService $registrasiService;

    public function __construct(RegistrasiService $registrasiService)
    {
        $this->registrasiService = $registrasiService;
    }


    public function data_pembayaran(PembayaranDataTables $dataTable)
    {

        // $model = new PMBBuktiPembayaranModel();

        // $dataPembayaran = $model->newQuery()->with(['registrasi' => function ($queryRegistrasi) {
        //     return $queryRegistrasi->with(['jalur_masuk' => function ($queryJalurMasuk) {
        //         return $queryJalurMasuk->with(['gelombang' => function ($queryGelombang) {
        //             return $queryGelombang->select(['id', 'nama', 'tahun']);
        //         }, 'jalur' => function ($queryJalur) {
        //             return $queryJalur->select(['id', 'nama']);
        //         }]);
        //     }])->select(['id', 'nama', 'pmb_users_id', "nomor_registrasi", "pmb_jalur_masuk_id", 'hp_mahasiswa']);
        // }])->get(['id', 'pmb_registrasi_nomor_registrasi', 'path', 'status', 'kategori']);
        // return response()->json($dataPembayaran);
        return $dataTable->render("keuangan.pembayaran-pmb");
        // $dataRegistrasi = $this->registrasiService->getRegistrasiWithStructRegis();
        // $dataPembayaran = PMBBuktiPembayaranModel::all(); //PMBRegistrasiModel::with(['bukti_pembayaran', 'users'])->get(['id', 'nama', 'no_wa', 'nomor_registrasi']);
        // return response()->json($dataRegistrasi);
        // return view('keuangan.pembayaran-pmb', compact('dataPembayaran'));

    }



    public function set_status_registrasi(string $nomorRegistrasi, string $status, string $kategori)
    {
        // 1 Validasi status (whitelist)
        $allowedStatus = ['Accept', 'Pending', 'Reject'];

        if (!in_array($status, $allowedStatus, true)) {
            throw ValidationException::withMessages([
                'status' => 'Status tidak valid',
            ]);
        }

        // 2 Ambil data registrasi (lebih efisien)
        $registrasi = PMBRegistrasiModel::with('users:id,email')
            ->select(['id', 'nomor_registrasi', 'pmb_users_id'])
            ->where('nomor_registrasi', $nomorRegistrasi)
            ->first();

        if (!$registrasi) {
            return back()->with('error-message', 'Data registrasi tidak ditemukan!');
        }

        // 3 Mapping status registrasi (jelas & aman)
        $statusRegistrasi = match ($status) {
            'Accept'  => 'Done',
            'Pending' => 'Pending',
            'Reject'  => 'Reject',
        };

        // 4 Transaction agar data konsisten
        DB::beginTransaction();

        try {
            $updateRegistrasi = PMBRegistrasiModel::where('nomor_registrasi', $nomorRegistrasi)
                ->update([
                    'status_bayar_registrasi' => $statusRegistrasi,
                ]);

            $updateBuktiPembayaran = PMBBuktiPembayaranModel::where([
                'pmb_registrasi_nomor_registrasi' => $nomorRegistrasi,
                'kategori' => $kategori,
            ])
                ->update([
                    'status' => $status,
                ]);

            // 5 Pastikan kedua update benar-benar terjadi
            if ($updateRegistrasi === 0 || $updateBuktiPembayaran === 0) {
                throw new \RuntimeException('Gagal memperbarui data pembayaran');
            }

            if ($status == "Registrasi") {
                Mail::to($registrasi->users->email)->send(new PembayaranRegistrasiMail($registrasi->nama, $registrasi->nomor_registrasi, now('Asia/Jakarta'), $status));
            } else if ($status == "Daftar Ulang") {
                Mail::to($registrasi->users->email)->send(new PembayaranRegistrasiUlangMail($registrasi->nama, $registrasi->nomor_registrasi, now('Asia/Jakarta'), $status));
            }

            DB::commit();

            return redirect('/keuangan/data-pembayaran')
                ->with(
                    'message',
                    "Berhasil verifikasi data pembayaran registrasi {$nomorRegistrasi}"
                );
        } catch (\Throwable $e) {
            DB::rollBack();

            report($e); // logging error

            return back()->with(
                'error-message',
                'Terjadi kesalahan saat memproses verifikasi pembayaran'
            );
        }
    }

    // public function set_status_registrasi($nomorRegistrasi, $status, $kategori)
    // {

    //     $registrasi = PMBRegistrasiModel::with(['users' => function ($queryUsers) {
    //         return $queryUsers->select(['id', 'email']);
    //     }])->where(['nomor_registrasi' => $nomorRegistrasi])->get(['id', 'nomor_registrasi', 'pmb_users_id'])->first();

    //     if (!$registrasi) {
    //         return back()->with("error-message", "Data tidak ditemukan!");
    //     }

    //     $statusRegistrasi = match ($status) {
    //         'Accept' => 'Done',
    //         'Pending', 'Reject' => $status,
    //         default => throw new \InvalidArgumentException('Status tidak valid'),
    //     };

    //     $resultUpdateRegistrasi = PMBRegistrasiModel::where('nomor_registrasi', $nomorRegistrasi)
    //         ->update([
    //             'status_bayar_registrasi' => $statusRegistrasi
    //         ]);

    //     $resultUpdateBuktiPembayaran = PMBBuktiPembayaranModel::where([
    //         'pmb_registrasi_nomor_registrasi' => $nomorRegistrasi,
    //         'kategori' => $kategori
    //     ])
    //         ->update([
    //             'status' => $status
    //         ]);

    //     if ($resultUpdateRegistrasi > 0 && $resultUpdateBuktiPembayaran > 0) {

    //         return redirect('/keuangan/data-pembayaran')->with('messagge', "Berhasil verifikasi data pembayaran registrasi $nomorRegistrasi");
    //     }

    //     return back()->with('message', 'Berhasil update data!');
    // }


    // public function set_status_registrasi($nomorRegistrasi, $status, $kategori)
    // {
    //     $statusRegistrasi = match ($status) {
    //         "Pending" => "Pending",
    //         "Reject" => "Reject",
    //         "Accept" => "Done"
    //     };

    //     $resultRegistrasi = PMBRegistrasiModel::where(['nomor_registrasi' => $nomorRegistrasi])->update(['status_bayar_registrasi' => $statusRegistrasi]);
    //     $resultUpdateBuktiPembayaran = PMBBuktiPembayaranModel::where(['pmb_registrasi_nomor_registrasi' => $nomorRegistrasi, "kategori" => $kategori])->update(['status' => $status]);

    //     if ($resultRegistrasi > 0 && $resultUpdateBuktiPembayaran > 0) {
    //         return back()->with("message", "Berhasil update data!");
    //     }

    //     return back()->with("error-message", "Gagal edit data!");
    // }
}
