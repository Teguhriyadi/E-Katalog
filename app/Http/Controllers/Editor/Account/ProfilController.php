<?php

namespace App\Http\Controllers\Editor\Account;

use App\Http\Controllers\Controller;
use App\Models\Akun\Editor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    public function index()
    {
        return view("editor.profil.v_index");
    }

    public function update(Request $request)
    {
        User::where("id_users", Auth::user()->id_users)->update([
            "nama" => $request->nama,
            "email" => $request->email
        ]);

        Editor::where("user_id", Auth::user()->id_users)->update([
            "nomer_telepon" => $request->nomer_telepon,
            "gender" => $request->gender,
            "alamat" => $request->alamat
        ]);

        return back()->with('message', 'Data Profil Berhasil Diperbaharui!');
    }

    public function ubah_password(Request $request)
    {
        if ($request->konfirmasi_password != $request->password_baru) {
            return back()->with('message', 'Konfirmasi Password Tidak Sesuai');
        } else {
            User::where("id_users", Auth::user()->id_users)->update([
                "password" => bcrypt($request->password_baru)
            ]);

            return back()->with('message', 'Password Berhasil diperbaharui');
        }
    }
}
