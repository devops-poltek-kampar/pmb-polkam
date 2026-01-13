<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GelombangRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return session('username') != null;
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
            'tahun' => ['required', 'numeric'],
            'open' => ['required', 'date'],
            'close' => ['required', 'date']
        ];
    }

    public function messages(): array
    {
        return [
            ".required" => ['Kolom ini harus diisi!'],
            "tahun.numeric" => ['Tahun harus berupa angka!'],
            "open.date" => ['Tanggal buka harus berupa tanggal!'],
            "close.date" => ['Tanggal tutup harus berupa angka!']
        ];
    }
}
