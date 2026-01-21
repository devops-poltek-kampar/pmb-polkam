<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegistrasiRequest;
use App\Mail\ForgotPasswordMail;
use App\Models\PMBForgotPasswordModel;
use App\Models\PMBUsersModel;
use App\Services\AuthService;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Laravel\Socialite\Socialite;

class AuthController extends Controller
{

    private AuthService $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function registrasi()
    {
        return view('auth.registrasi');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function form_reset_password($userId)
    {
        $forgotPassword = PMBForgotPasswordModel::where(['pmb_users_id' => $userId])->first();
        if (!$forgotPassword) {
            return redirect('/');
        }
        if ($forgotPassword) {
            $isPast =  Carbon::parse(($forgotPassword->created_at))->addMinute(30)->isPast();
            if ($isPast) {
                return redirect('/login')->with('error-message', "ada kesalahan!");
            }
        }
        return view('auth.form-reset-password');
    }

    function form_token_password()
    {
        return view('auth.form-token');
    }

    public function login_keuangan()
    {
        return view("auth.keuangan-login");
    }
    public function login_pmb()
    {
        return view('auth.pmb-login');
    }

    public function forgot_password()
    {
        return view('auth.forgot-password');
    }

    public function send_email(Request $request)
    {
        try {

            DB::beginTransaction();

            $email = $request->post('email');
            // $user = PMBUsersModel::where(['email' => $email])->get(['email', 'username', 'id'])->first();
            $user = PMBUsersModel::whereEmail($email)->get(['id', 'username', 'email', 'google_id'])->first();
            // return response()->json($user);
            if (!$user) {
                return back()->with("message", "Email tidak terdaftar!");
            }
            if ($user->google_id != null) {
                return redirect('/auth/forgot-password')->with('failed', "Maaf email tidak terdaftar!");
            }

            $token = random_int(100000, 999999);
            $forgotPassword = PMBForgotPasswordModel::create([
                'id' => strtoupper(Str::random(20)),
                "pmb_users_email" => $email,
                "token" => $token
            ]);

            if ($forgotPassword) {
                $resultEmail = Mail::to($user->email)->send(new ForgotPasswordMail($user->username, $email, $token));
                if ($resultEmail == null) {
                    DB::rollBack();
                    return redirect('/auth/forgot-password')->with('failed', "Gagal kirim email");
                }
                DB::commit();
                session()->flash('message', "Token sudah dikirim ke $user->email");
                return view('auth.form-token');
                // return redirect('/auth/forgot-password/token')->with('message', "Token sudah dikirim ke $user->email");
            }
        } catch (Exception $ex) {
            DB::rollBack();
            return redirect('/auth/forgot-password')->with("failed", "Terjadi kesalahan!");
        }
    }

    public function check_token(Request $request)
    {

        $token = $request->post('token');

        $forgotPassword = PMBForgotPasswordModel::where(['token' => $token])->first();
        // return response()->json($forgotPassword);
        if ($forgotPassword) {
            $isTokenPass = Carbon::parse($forgotPassword->created_at)->addMinutes(30)->isPast();
            if ($isTokenPass) {
                return redirect('/auth/forgot-password/token')->with('failed', "Token sudah kadaluarsa");
            }

            return view('auth.form-reset-password', compact('forgotPassword'));
        }
        return redirect('/auth/forgot-password')->with('failed', 'Token tidak ditemukan!');
    }

    public function reset_password(Request $request)
    {
        $dataValid = $request->validate([
            'email' => ['required'],
            'password' => ['required', 'confirmed']
        ]);

        $user = PMBUsersModel::whereEmail($dataValid['email'])->first();

        if ($user) {
            $user->password = bcrypt($dataValid['password']);
            $user->save();
            return redirect('/login')->with('message', 'Password berhasil direset, silahkan login untuk melanjutkan registrasi!');
        }
        return redirect('/login')->with("failed", "akun tidak ditemukan!");
    }

    public function google_auth()
    {
        return Socialite::driver('google')->redirect();
    }

    public function google_auth_callback()
    {

        $googleUser = Socialite::driver('google')->user();

        $userByGoogleId = PMBUsersModel::where(['google_id' => $googleUser->getId(), 'email' => $googleUser->getEmail()])->first();
        if (!$userByGoogleId) {
            $user = PMBUsersModel::create([
                "id" => strtoupper(Str::random(20)),
                "google_id" => $googleUser->getId(),
                "pmb_role_id" => 3,
                "username" => $googleUser->getName(),
                "email" => $googleUser->getEmail(),
                "nomor_hp" => null,
                "password" => bcrypt(Str::random(10)),
                "status" => "Verified",
                "foto_profile" => $googleUser->getAvatar(),
            ]);

            session(["id" => $user->id, 'username' => $user->username, "email" => $user->email, "role_id" => $user->pmb_role_id]);

            if ($user) {
                return redirect('/user/dashboard');
            }
        }
        session(["id" => $userByGoogleId->id, 'username' => $userByGoogleId->username, "email" => $userByGoogleId->email, "role_id" => $userByGoogleId->pmb_role_id]);
        return redirect('/user/dashboard');
    }

    public function verified($id)
    {

        $resultVerified = $this->authService->verifiedAccount($id);

        if ($resultVerified['status'] == 200) {
            return redirect($resultVerified['path'])->with("message", $resultVerified['message']);
        }
        return redirect($resultVerified['path'])->with("message", $resultVerified['message']);
    }

    public function logout()
    {
        session()->flush();
        return redirect('/login');
    }

    public function register(RegistrasiRequest $request)
    {
        try {
            $dataRegistrasi = $request->validated();
            $dataRegistrasi['password'] = bcrypt($dataRegistrasi['password']);
            $dataRegistrasi['status'] = "Suspend";
            $dataRegistrasi['pmb_role_id'] = 3;
            $dataRegistrasi['pmb_users_id'] = session('id');
            $dataRegistrasi['id'] = strtoupper(Str::random(20));

            $resultRegistrasi  = $this->authService->register($dataRegistrasi);

            if ($resultRegistrasi['status'] == 201) {
                return redirect('/login')->with("message", $resultRegistrasi['message']);
            }

            return back()->with("error-message", $resultRegistrasi['error-message']);
        } catch (Exception $ex) {
            Log::channel('authentication')->error('registrasi error!', [
                'message' => $ex->getMessage(),
                'waktu' => Carbon::now()->translatedFormat("l, j F Y H:i")
            ]);
            abort(500);
        }
    }

    public function auth(Request $request)
    {
        $resultLogin = $this->authService->auth($request->except("_token"));
        // return response()->json($resultLogin);
        if ($resultLogin['status'] == 200) {
            return redirect($resultLogin['path']);
        }
        return back()->with('error-message', $resultLogin['message']);
    }
}
