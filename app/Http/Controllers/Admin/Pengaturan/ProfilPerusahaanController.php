<?php

namespace App\Http\Controllers\Admin\Pengaturan;

use App\Http\Controllers\Controller;
use App\Models\Pengaturan\ProfilPerusahaan;
use Illuminate\Http\Request;

class ProfilPerusahaanController extends Controller
{
    public function index()
    {
        $data["profil_perusahaan"] = ProfilPerusahaan::first();

        return view("admin.pengaturan.profil_perusahaan.v_index", $data);
    }

    public function store(Request $request)
    {
        if ($request->file("foto")) {
            $data = $request->file("foto")->store("profil_perusahaan");
        }

        ProfilPerusahaan::create([
            "id_profil" => "PRF-" . date("YmdHis"),
            "nama_perusahaan" => $request->nama_perusahaan,
            "deskripsi_singkat" => $request->deskripsi_singkat,
            "deskripsi" => $request->deskripsi,
            "nomor_hp" => $request->nomor_hp,
            "email" => $request->email,
            "alamat" => $request->alamat,
            "foto" => url('/storage/' . $data)
        ]);

        return back()->with('message', 'Data Profil Perusahaan Berhasil Ditambahkan!');
    }
}
