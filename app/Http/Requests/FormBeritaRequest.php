<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormBeritaRequest extends FormRequest
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
            "subjek" => ['required'],
            "deskripsi" => ['required'],
            "thumbnail" => ['required', 'mimes:jpg,jpeg,png']
        ];
    }
}
