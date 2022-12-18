<?php

namespace App\Http\Controllers\Admin\Account;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilSayaController extends Controller
{
    public function index()
    {
        return view("admin.users.profil_saya.v_index");
    }

    public function update(Request $request, $id_users)
    {
        User::where("id_users", $id_users)->update([
            "nama" => $request->nama,
            "email" => $request->email
        ]);

        return back()->with('message', 'Data Profil Berhasil Diubah!');
    }

    public function ubah_password(Request $request)
    {
        if ($request->konfirmasi_password != $request->password_baru) {
            return back()->with("message", "Konfirmasi Password Tidak Sesuai");
        } else {
            User::where("id_users", Auth::user()->id_users)->update([
                "password" => bcrypt($request->password)
            ]);

            return back()->with('message', 'Data Password Berhasil Diubah!');
        }
    }
}
