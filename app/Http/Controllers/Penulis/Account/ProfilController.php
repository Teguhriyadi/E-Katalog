<?php

namespace App\Http\Controllers\Penulis\Account;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    public function index()
    {
        return view("penulis.akun.v_index");
    }

    public function update(Request $request)
    {
        User::where("id_users", Auth::user()->id_users)->update([
            "nama" => $request->nama,
            "email" => $request->email
        ]);

        return back()->with('message', 'Data Artikel Berhasil Ditambahkan!');
    }

    public function ubah_password(Request $request)
    {
        if ($request->konfirmasi_password != $request->password_baru) {
            return back()->with('message', 'Konfirmasi Password Tidak Sesuai!');
        } else {
            User::where("id_users", Auth::user()->id_users)->update([
                "password" => bcrypt($request->password_baru)
            ]);

            return back()->with('message', 'Password Berhasil di Perbaharui');
        }
    }
}
