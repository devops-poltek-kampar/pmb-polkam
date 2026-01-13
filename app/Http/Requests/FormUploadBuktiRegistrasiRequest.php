<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormUploadBuktiRegistrasiRequest extends FormRequest
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
            "bukti_registrasi" => ['required', "mimes:jpg,jpeg,png"],
            "pmb_registrasi_nomor_registrasi" => ['required', 'numeric']
        ];
    }

    public function messages(): array
    {
        return [
            "bukti_registrasi.required" => "Mohon masukan bukti pembayaran registrasi!",
            "bukti_registrasi.mimies" => "Bukti registrasi harus berbentuk JPG, JPEG, PNG",
            'nomor_registrasi.required' => "Nomor registrasi tidak boleh kosong!"
        ];
    }
}
