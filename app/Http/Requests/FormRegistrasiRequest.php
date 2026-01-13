<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormRegistrasiRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return session("username") != null;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nama' => ['required'],
            'tempat_lahir' => ['required'],
            'tanggal_lahir' => ['required', 'date'],
            'jenis_kelamin' => ['required', "in:Laki-laki,Perempuan"],
            "alamat" => ['required'],
            "asal_kecamatan" => ['required'],
            "rt" => ['numeric'],
            "rw" => ['numeric'],
            "provinsi" => ['required'],
            "kode_pos" => ['numeric'],
            "hp_ortu" => ['required', 'numeric'],
            "hp_mahasiswa" => ['required', 'numeric'],
            "no_wa" => ['required', "numeric"],
            "agama" => ['required', 'not_in:Pilih'],
            "status_nikah" => ['required', "not_in:Pilih"],
            "asal_sekolah" => ['required'],
            "jurusan" => ['required'],
            "sumber_info_daftar" => ['required'],
            "sumber_info" => ['required_if:sumber_info_daftar,Teman/Saudara,Website/Medsos,Lainnya'],
            "pernyataan_serah_data" => ['required'],
            "pas_foto" => ['required', 'mimes:jpg,jpeg,png'],
            'ktp' => ['mimes:jpg,jpeg,png'],
            'prodi_pilihan_1' => ['required', "not_in:Pilih"],
            "prodi_pilihan_2" => ['required', "not_in:Pilih"],
            "pmb_jalur_masuk_id" => ['required', "not_in:Pilih"],
            "pmb_gelombang_id" => ['required'],
            "kartu_keluarga" => ['required_if:jalur_masuk,5', "mimes:pdf"],
            "surat_keterangan_tidak_mampu" => ['required_if:jalur_masuk,5', "mimes:pdf"],
            // "pembiayaan" => ['required', "not_in:Pilih"],
            "pernyataan_data_valid" => ['required'],
        ];
    }

    public function messages(): array
    {
        return [
            'kartu_keluarga.required_if' => "Wajib mengirim kartu keluarga jika jalur masuk KIP Kuliah!",
            "kartu_keluarga.mimes" => 'Kartu keluarga harus berupa PDF!',
            'surat_keterangan_tidak_mampu.required_if' => "Wajib mengirim surat keterangan tidak mampu jika jalur masuk KIP Kuliah!",
            "surat_keterangan_tidak_mampu.mimes" => "Surat keterangan tidak mampu harus berupa PDF!"
        ];
    }
}
