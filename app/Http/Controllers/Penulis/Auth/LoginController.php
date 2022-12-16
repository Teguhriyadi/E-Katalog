<?php

namespace App\Http\Controllers\Penulis\Auth;

use App\Http\Controllers\Controller;
use App\Models\Penulis;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login()
    {
        return view("penulis.auth.v_login");
    }

    public function post_login(Request $request)
    {
        $credentials = $request->validate([
            "email" => "required|email",
            "password" => "required"
        ]);

        $password = $request->password;

        $user = User::where("email", $request->email)->first();

        if ($user) {
            $cek_password = Hash::check($password, $user->password);

            if (!$cek_password) {
                return back();
            } else {
                if (Auth::attempt($credentials)) {
                    if ($user->role == "penulis") {
                        $request->session()->regenerate();

                        return redirect("/penulis/dashboard");
                    }
                } else {
                    return back();
                }
            }
        }

    }

    public function daftar()
    {
        return view("penulis.auth.v_daftar");
    }

    public function proses_daftar(Request $request)
    {
        $user = new User;

        $user->id_users = date("YmdHis");
        $user->nama = $request["nama"];
        $user->email = $request["email"];
        $user->password = bcrypt($request->password);
        $user->role = "penulis";
        $user->status = 1;

        $user->save();

        $data_user = User::where("email", $request["email"])->first();

        $customer = new Penulis;

        $customer->id_penulis = "PN-" . date("YmdHis");
        $customer->user_id = $data_user->id_users;
        $customer->nomer_telepon = $request["nomer_telepon"];
        $customer->alamat = $request["alamat"];

        $customer->save();

        return redirect("/auth/penulis/login");
    }
}
