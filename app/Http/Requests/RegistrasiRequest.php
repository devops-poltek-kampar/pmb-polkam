<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrasiRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "username" => ['required', "min:10"],
            "email" => ['required', "email", "unique:pmb_users,email"],
            "nomor_hp" => ['required', "numeric"],
            "password" => ['required', "confirmed"],
        ];
    }

    public function messages(): array
    {
        return [
            "username.required" => "Mohon isi username!",
            "username.min" => "Username harus minimal 10 karakter!",
            "email.required" => "Mohon isi email!",
            "email.email" => "Email yang dimasukan tidak berformat email!",
            "email.unique" => "Email sudah terdaftar",
            "nomor_hp.required" => "Mohon isi nomor HP!",
            "nomor_hp.numeric" => "Nomor HP harus berisi angka!",
            "password" => "Mohon masukan password",
            "password.confirmed" => "Password tidak sama!"
        ];
    }
}
