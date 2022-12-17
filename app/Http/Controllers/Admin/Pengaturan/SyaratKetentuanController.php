<?php

namespace App\Http\Controllers\Admin\Pengaturan;

use App\Http\Controllers\Controller;
use App\Models\Pengaturan\SyaratKetentuan;
use Illuminate\Http\Request;

class SyaratKetentuanController extends Controller
{
    public function index()
    {
        $data["syarat_ketentuan"] = SyaratKetentuan::first();

        return view("admin.pengaturan.syarat_ketentuan.v_index", $data);
    }

    public function store(Request $request)
    {
        SyaratKetentuan::create([
            "id_syarat_ketentuan" => "SK-" . date("YmdHis"),
            "keterangan" => $request->keterangan
        ]);

        return back()->with('message', 'Data Syarat Ketentuan Berhasil Ditambahkan!');
    }

    public function update(Request $request, $id_syarat_ketentuan)
    {
        SyaratKetentuan::where("id_syarat_ketentuan", $id_syarat_ketentuan)->update([
            "keterangan" => $request->keterangan
        ]);

        return back()->with('message', 'Data Syarat Ketentuan Berhasil Diubah!');
    }
}
