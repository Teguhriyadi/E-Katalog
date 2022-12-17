<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterFormRequest;
use App\Models\Customer;
use App\Models\Pengaturan\ProfilPerusahaan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login()
    {
        $data["kontak"] = ProfilPerusahaan::first();

        return view("user.autentikasi.login", $data);
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

                    return redirect("/");
                }
            }
        } else {
            return back();
        }
    }

    public function daftar()
    {
        $data["kontak"] = ProfilPerusahaan::first();

        return view("user.autentikasi.register", $data);
    }

    public function post_register(RegisterFormRequest $request)
    {
        $validatedData = $request->validated();

        $tanggal = date("YmdHis");

        $user = new User;

        $user->id_users = $tanggal;
        $user->nama = $validatedData["nama"];
        $user->email = $validatedData["email"];
        $user->password = bcrypt($validatedData["password"]);
        $user->role = "customer";
        $user->created_by = 0;
        $user->status = 1;

        $user->save();

        $customer = new Customer;

        $customer->id_customer = date("YmdHis");
        $customer->user_id = $tanggal;
        $customer->notelp = $request->notelp;
        $customer->alamat = $request->alamat;
        $customer->gender = $request->gender;

        $customer->save();

        return redirect("/login");
    }
}
