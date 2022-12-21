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
        $tampung = session()->get("login");

        $data["kontak"] = ProfilPerusahaan::first();

        return view("user.autentikasi.login", $data);
    }

    public function post_login(Request $request)
    {
        $tampung = session()->get("login");

        $credentials = $request->validate([
            "email" => "required",
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

                    if (!empty($tampung)) {

                        session()->forget("login");

                        return redirect("/keranjang");
                    }

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

    public function post_daftar(Request $request)
    {
        $tanggal = date("YmdHis");

        $user = new User;

        $user->id_users = $tanggal;
        $user->nama = $request["nama_depan"] . " " . $request->nama_belakang;
        $user->email = $request["email"];
        $user->password = bcrypt($request["password"]);
        $user->role = "customer";
        $user->created_by = 0;
        $user->status = 1;

        $user->save();

        $customer = new Customer;

        $customer->id_customer = "CS-" . date("YmdHis");
        $customer->user_id = $tanggal;
        $customer->nomer_telepon = $request->notelp;
        $customer->alamat = $request->alamat;
        $customer->gender = $request->gender;

        $customer->save();

        return redirect("/login");
    }
}
