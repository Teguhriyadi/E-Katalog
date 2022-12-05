<?php

namespace App\Http\Controllers\Autentikasi;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AutentikasiController extends Controller
{
    public function login()
    {
        return view("autentikasi.login");
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
                    $request->session()->regenerate();

                    if ($user->role == "admin") {
                        return redirect("/admin/dashboard");
                    } else {
                        echo "Member";
                    }
                }
            }
        } else {
            return back();
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect("/auth");
    }
}
