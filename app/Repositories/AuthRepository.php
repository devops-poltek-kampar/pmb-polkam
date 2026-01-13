<?php

namespace App\Repositories;

use App\Models\PMBUsersModel;
use Illuminate\Support\Facades\Auth;

class AuthRepository
{

    public function storeDataRegisterAccount(array $dataRegistrasi)
    {
        return PMBUsersModel::create($dataRegistrasi);
    }

    public function authLogin($credentials)
    {
        $resultLogin = Auth::attempt($credentials);
        if ($resultLogin) {
            return Auth::user();
        }
        return null;
    }

    public function verifiedAccount($id)
    {
        return PMBUsersModel::where(["id" => $id])->update(['status' => "Verified"]);
    }
}
