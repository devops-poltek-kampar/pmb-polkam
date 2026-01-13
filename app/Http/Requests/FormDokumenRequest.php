<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormDokumenRequest extends FormRequest
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
            'tipe' => ['required', 'in:JPG,JPEG,PNG,PDF'],
            'sifat' => ['required', 'not_in:Pilih']
        ];
    }
}
