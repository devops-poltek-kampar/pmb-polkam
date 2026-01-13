<?php

namespace App\Services;

use App\Events\UserRegisterEvent;
use App\Repositories\AuthRepository;
use App\Mail\ActivationEmail;
use Exception;
use Illuminate\Support\Facades\Mail;

class AuthService
{
    private AuthRepository $authRepository;
    public function __construct(AuthRepository $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    public function register(array $dataRegistrasi)
    {
        $resultRegistrasiAccount = $this->authRepository->storeDataRegisterAccount($dataRegistrasi);
        if ($resultRegistrasiAccount) {
            try {
                event(new UserRegisterEvent($resultRegistrasiAccount));
                // Mail::to($resultRegistrasiAccount->email)->send(new ActivationEmail($resultRegistrasiAccount));
            } catch (Exception $ex) {
                return ['status' => 403, "message" => "Maaf email tidak ditemukan!"];
            }
            return ['status' => 201, "message" => "Selamat anda berhasil melakukan registrasi akun! silahkan verifikasi akun anda dengan klik link yang dikirim ke email anda!"];
        }
        return ['status' => 403, "error-message" => "Gagal melakukan registrasi"];
    }

    public function auth($credentials)
    {
        $userResult = $this->authRepository->authLogin($credentials);
        // return $userResult;
        // return response()->json($userResult);
        if ($userResult) {

            if ($userResult['status'] == "Suspend") {
                return ['status' => 403, 'path' => '/login', "message" => "Akun belum diaktivasi, silahkan klik link pada email yang sudah dikirimkan"];
            }

            session(["id" => $userResult['id'], 'username' => $userResult['username'], "email" => $userResult['email'], "role_id" => $userResult['pmb_role_id']]);

            $path = match ($userResult['pmb_role_id']) {
                2 => "/keuangan/dashboard",
                3 => "/user/dashboard",
                4 => "akademik/dashboard",
                default => "/pmb/dashboard"
            };
            return ['status' => 200, "path" => $path];
        }

        return ['status' => 404, "path" => "/login", "message" => "email atau password tidak ditemukan!"];
    }

    public function verifiedAccount($id)
    {
        $resultVerification = $this->authRepository->verifiedAccount($id);
        if ($resultVerification > 0) {
            return ['status' => 200, "path" => "/login", "message" => "Selamat! akun anda berhasil diverifikasi! silahkan login untuk melanjutkan pendaftaran"];
        }
        return ['status' => 404, "path" => "/login", "error-message" => "Gagal verifikasi akun!"];
    }
}
