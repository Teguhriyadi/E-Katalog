<?php

namespace App\Http\Controllers\Autentikasi;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterAkunFormRequest;
use App\Models\Pengaturan\ProfilPerusahaan;
use App\Models\Penulis;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AutentikasiController extends Controller
{
    public function login()
    {
        $data["kontak"] = ProfilPerusahaan::first();

        return view("autentikasi.login", $data);
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
                    } else if ($user->role == "editor") {
                        return redirect("/editor/dashboard");
                    }
                }
            }
        } else {
            return back();
        }
    }

    public function logout()
    {
        if (Auth::user()->role == "penulis") {
            Auth::logout();

            return redirect("/auth/penulis/login");
        } else {
            Auth::logout();

            return redirect("/auth");
        }
    }

    public function register()
    {
        $data["kontak"] = ProfilPerusahaan::first();

        return view("autentikasi.register", $data);
    }

    public function post_register(RegisterAkunFormRequest $request)
    {
        $validatedData = $request->validated();

        if ($request->password != $request->confirm_password) {
            return back();
        }

        $user = new User;

        $user->id_users = date("YmdHis");
        $user->nama = $validatedData["nama"];
        $user->email = $validatedData["email"];
        $user->password = bcrypt($validatedData["password"]);
        $user->role = "penulis";

        $user->save();

        Penulis::create([
            "id_penulis" => date("HisYmd"),
            "user_id" => $user->id_users,
            "nomer_telepon" => $validatedData["nomer_telepon"],
            "alamat" => $validatedData["alamat"]
        ]);

        return redirect("/auth");
    }
}
