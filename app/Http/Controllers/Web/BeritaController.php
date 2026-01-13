<?php

namespace App\Http\Controllers\Web;

use App\DataTables\BeritaDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\FormBeritaRequest;
use App\Models\PMBBeritaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    public function index(BeritaDataTable $dataTable)
    {
        return $dataTable->render('pmb.master-web.berita.berita');
    }

    public function tambah()
    {
        return view('pmb.master-web.berita.tambah');
    }

    public function form_edit_berita($beritaId)
    {
        $berita = PMBBeritaModel::find($beritaId);

        return view('pmb.master-web.berita.edit', compact('berita'));
    }

    public function edit_berita(FormBeritaRequest $request)
    {

        $berita = PMBBeritaModel::find($request->post('id'));

        if ($berita) {
            $berita->subjek = $request->post('subjek');
            $berita->deskripsi = $request->post('deskripsi');
            $berita->slug = strtolower(Str::replace(' ', '-', $request->post('subjek')));
            $berita->thumbnail = $request->file('thumbnail')->store('/uploads/berita');
            $berita->save();
            return redirect('/pmb/master-web/berita')->with("message", 'Berhasil edit berita!');
        }

        return back()->with('error-message', 'Data berita tidak ditemukan!');
    }

    public function create(FormBeritaRequest $request)
    {
        $dataBerita = $request->validated();
        $berita = PMBBeritaModel::create([
            "id" => strtoupper(Str::random(20)),
            "slug" => strtolower(str_replace(" ", "-", $dataBerita['subjek'])),
            'subjek' => $dataBerita['subjek'],
            "deskripsi" => $dataBerita['deskripsi'],
            "thumbnail" => $request->file('thumbnail')->store('/upload/berita')
        ]);
        if ($berita) {
            return redirect('/pmb/master-web/berita')->with("message", "Berhasil simpan data!");
        }
        return back()->with("error-message", "Gagal simpan data!");
    }
}
