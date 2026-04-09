<?php

namespace App\Http\Controllers\PMB;

use App\DataTables\DataRegistrasiDataTable;
use App\Http\Controllers\Controller;
use App\Mail\AccFormulirMail;
use App\Models\PMBCBTModel;
use App\Models\PMBGelombangModel;
use App\Models\PMBJalurMasukModel;
use App\Models\PMBRegistrasiModel;
use App\Services\RegistrasiService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use PhpOffice\PhpSpreadsheet\Calculation\Statistical\Distributions\F;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class CalonMahasiswaController extends Controller
{

    private RegistrasiService $registrasiService;
    public function __construct(RegistrasiService $registrasiService)
    {
        $this->registrasiService = $registrasiService;
    }

    public function data_registrasi()
    {
        $dataRegistrasi = $this->registrasiService->getRegistrasiWithStructRegis();
        // return response()->json($dataRegistrasi);
        return view('maba.data-registrasi', compact('dataRegistrasi'));
    }

    public function index(DataRegistrasiDataTable $dataTable)
    {

        $gelombang = PMBGelombangModel::lazy();
        $jalurMasuk = PMBJalurMasukModel::with(['jalur'])->lazy();

        return $dataTable->render("pmb.calon-mahasiswa.index", compact('gelombang', 'jalurMasuk'));
    }


    public function export_calon_mahasiswa(Request $request)
    {

        // $dataValid = $request->validate(['pmb_gelombang_id' => ['not_in:Pilih']]);

        $gelombangId = $request->get('pmb_gelombang_id');

        // $jaluMasukId = $request->get('pmb_jalur_masuk_id');

        // if ($gelombangId != "Pilih" && $jaluMasukId != "Pilih") {

        //     $dataCalonMahasiswa = PMBRegistrasiModel::where(['pmb_gelombang_id' => $gelombangId, 'pmb_jalur_masuk_id' => $jaluMasukId])->get();
        // }

        if ($gelombangId != "Pilih") {
            $dataCalonMahasiswa = PMBGelombangModel::with(['registrasi' => function ($queryRegistrasi) {

                return $queryRegistrasi->with(['users', 'jalur_masuk' => function ($queryJalurMasuk) {
                    return $queryJalurMasuk->with(['gelombang', 'jalur']);
                }]);
                // return $queryRegistrasi->select(['id', 'pmb_gelombang_id']);
            }])->where(['id' => $gelombangId])->get()->first();
            // $dataCalonMahasiswa = PMBRegistrasiModel::where(['pmb_gelombang_id' => $gelombangId])->get();
        }
        // return response()->json($dataCalonMahasiswa);
        // if ($jaluMasukId != "Pilih") {

        //     $dataCalonMahasiswa = PMBRegistrasiModel::where(['pmb_jalur_masuk_id' => $jaluMasukId])->get();
        // }

        // Buat spreadsheet
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Header
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Nama');
        $sheet->setCellValue('C1', 'Jenis Kelamin');
        $sheet->setCellValue('D1', 'Tempat Lahir');
        $sheet->setCellValue('E1', 'Tanggal Lahir');
        $sheet->setCellValue('F1', 'Alamat');
        $sheet->setCellValue('G1', 'Asal Kecamatan');
        $sheet->setCellValue('H1', 'RT');
        $sheet->setCellValue('I1', 'RW');
        $sheet->setCellValue('J1', 'Provinsi');
        $sheet->setCellValue('K1', 'HP Orang Tua');
        $sheet->setCellValue('L1', 'HP Calon Mahasiswa');
        $sheet->setCellValue('M1', 'WhatsApp');
        $sheet->setCellValue('N1', 'Agama');
        $sheet->setCellValue('O1', 'Asal Sekolah');
        $sheet->setCellValue('P1', 'Email');
        $sheet->setCellValue('Q1', 'Nomor Registrasi');
        $sheet->setCellValue('R1', 'Gelombang');
        $sheet->setCellValue('S1', 'Tahun gelombang');
        $sheet->setCellValue('T1', 'Jalur Masuk');


        $indexData = 2;
        $nomor = 1;

        foreach ($dataCalonMahasiswa->registrasi as $registrasi) {

            $sheet->setCellValue("A" . $indexData, $nomor++);
            $sheet->setCellValue("B" . $indexData, $registrasi->nama);
            $sheet->setCellValue("C" . $indexData, $registrasi->jenis_kelamin);
            $sheet->setCellValue("D" . $indexData, $registrasi->tempat_lahir);
            $sheet->setCellValue("E" . $indexData, $registrasi->tanggal_lahir);
            $sheet->setCellValue("F" . $indexData, $registrasi->alamat);
            $sheet->setCellValue("G" . $indexData, $registrasi->asal_kecamatan);
            $sheet->setCellValue("H" . $indexData, $registrasi->rt);
            $sheet->setCellValue("I" . $indexData, $registrasi->rw);
            $sheet->setCellValue("J" . $indexData, $registrasi->provinsi);
            $sheet->setCellValue("K" . $indexData, $registrasi->hp_ortu);
            $sheet->setCellValue("L" . $indexData, $registrasi->hp_mahasiswa);
            $sheet->setCellValue("M" . $indexData, $registrasi->no_wa);
            $sheet->setCellValue("N" . $indexData, $registrasi->agama);
            $sheet->setCellValue("O" . $indexData, $registrasi->asal_sekolah);
            $sheet->setCellValue("P" . $indexData, $registrasi->users->email);
            $sheet->setCellValue("Q" . $indexData, $registrasi->nomor_registrasi);
            $sheet->setCellValue("R" . $indexData, $registrasi->jalur_masuk->gelombang->nama);
            $sheet->setCellValue("S" . $indexData, $registrasi->jalur_masuk->gelombang->tahun);
            $sheet->setCellValue("T" . $indexData, $registrasi->jalur_masuk->jalur->nama);

            $indexData++;
        }


        return response()->streamDownload(function () use ($spreadsheet) {
            $writer = new Xlsx($spreadsheet);
            $writer->save('php://output');
        }, 'data_pendaftaran.xlsx');
    }

    public function detail_registrasi($registrasiId)
    {
        $registrasi = PMBRegistrasiModel::with([
            'prodi_1:kode_prodi,nama',
            'prodi_2:kode_prodi,nama',
            'users:id,username,email,nomor_hp',
            'lampiran:id,pmb_registrasi_id,nama,path,status,kategori',
            'jalur_masuk:id,pmb_gelombang_id,pmb_jalur_id',
            'jalur_masuk.gelombang:id,nama,tahun',
            'jalur_masuk.jalur:id,nama',
        ])->where(['id' => $registrasiId])->first();
        // $registrasi = PMBRegistrasiModel::with(['users' => function ($queryUsers) {
        //     return $queryUsers->select(['id', 'username', 'email', 'nomor_hp']);
        // }, 'lampiran' => function ($queryLampiran) {
        //     return $queryLampiran->select(['pmb_registrasi_id', 'nama', 'path', 'status', 'kategori']);
        // }, 'jalur_masuk'])->where(['id' => $registrasiId])->first(); //$this->registrasiService->getRegistrasiById($registrasiId);
        // return response()->json($registrasi);
        return view('pmb.calon-mahasiswa.detail-registrasi', compact('registrasi'));
    }

    public function acc_formulir($nomorRegistrasi)
    {
        try {
            // $resultUpdate = PMBRegistrasiModel::where(['nomor_registrasi' => $nomorRegistrasi])->update(['status_registrasi' => "Approve"]);
            $registrasi = PMBRegistrasiModel::with(['users' => function ($queryUsers) {
                return $queryUsers->select(['id', 'username', 'email', 'nomor_hp']);
            }])->where(['nomor_registrasi' => $nomorRegistrasi])->get(['id', 'nomor_registrasi', 'nama', 'pmb_users_id', 'status_bayar_registrasi'])->first();
            if ($registrasi) {

                if ($registrasi->status_bayar_registrasi != "Done") {
                    return redirect("/pmb/calon-mahasiswa/detail-registrasi/" . $registrasi->id)->with('info', "Pembayaran registrasi belum diselesaikan!");
                }

                if ($registrasi->status_registrasi == "Approve") {
                    return back()->with("message", "Sudah diverifikasi");
                }

                $registrasi->status_registrasi = "Approve";
                if ($registrasi->save()) {

                    Mail::to($registrasi->users->email)->send(new AccFormulirMail($registrasi));

                    PMBCBTModel::create([
                        "id" => strtoupper(Str::random(20)),
                        "nomor_registrasi" => $nomorRegistrasi,
                        "status" => "Tidak Lulus",
                        "aktif" => "Y"
                    ]);
                    //buat data cbt untuk maba masuk ke tahap cbt
                    return redirect('/pmb/calon-mahasiswa')->with('message', "Mahasiswa baru dinyatakan lulus. mahasiswa masuk ke tahap CBT!");
                }
            }

            return back()->with("error-message", "Gagal update data!");
        } catch (Exception $exception) {
            Log::channel('registrasi')->error("Failed Acc Formulir!", [
                "message" => $exception->getMessage(),
                'trace' => $exception->getTraceAsString()
            ]);
            throw new Exception($exception->getMessage(), 1);
        }
    }
}
