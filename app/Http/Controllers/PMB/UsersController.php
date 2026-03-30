<?php

namespace App\Http\Controllers\PMB;

use App\DataTables\UsersDataTable;
use App\Http\Controllers\Controller;
use App\Models\PMBUsersModel;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(UsersDataTable $dataTable)
    {
        return $dataTable->render('pmb.data-user.index');
    }

    public function set_status(Request $request)
    {
        $user = PMBUsersModel::find($request->input('id'));

        if ($user) {
            $user->status = $request->input('status');
            $user->save();
            return response()->json([
                "status" => 200,
                "message" => "Berhasil " . $request->input('status') . " user!"
            ]);
        }

        return response()->json([
            "message" => "User tidak ditemukan!",
            "status" => 404
        ], 404);
    }

    public function reset_password(Request $request)
    {
        $user = PMBUsersModel::find($request->input('id'));

        if ($user) {
            $user->password = bcrypt($request->input('password'));

            $user->save();
            return response()->json([
                'status' => 200,
                'message' => "Berhasil reset password!",
            ]);
        }
        return response()->json([
            'status' => 404,
            'message' => "User tidak ditemukan!",
        ], 404);
    }
}
