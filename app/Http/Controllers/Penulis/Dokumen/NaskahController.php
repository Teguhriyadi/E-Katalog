<?php

namespace App\Http\Controllers\Penulis\Dokumen;

use App\Http\Controllers\Controller;
use App\Models\Dokumen\Naskah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class NaskahController extends Controller
{
    public function index()
    {
        $data["naskah"] = Naskah::where("penulis_id", Auth::user()->penulis->id_penulis)->get();

        return view("penulis.naskah.v_index", $data);
    }

    public function create()
    {
        return view("penulis.naskah.v_create");
    }

    public function store(Request $request)
    {
        if ($request->file("file_naskah")) {
            $data = $request->file("file_naskah")->store("naskah");
        }

        Naskah::create([
            "id_naskah" => "NSKH-" . date("YmdHis"),
            "judul_naskah" => $request->judul_naskah,
            "desc_naskah" => $request->desc_naskah,
            "kategori_naskah" => $request->kategori_naskah,
            "tgl_upload" => date("Ymd"),
            "penulis_id" => Auth::user()->penulis->id_penulis,
            "file_naskah" => url('/storage/' . $data),
        ]);

        return redirect("/penulis/master/naskah")->with('message', 'Data Artikel Berhasil Ditambahkan!');
    }

    public function edit($id_naskah)
    {
        $data["edit"] = Naskah::where("id_naskah", $id_naskah)->first();

        return view("penulis.naskah.v_edit", $data);
    }

    public function update(Request $request, $id_naskah)
    {
        Naskah::where("id_naskah", $id_naskah)->update([
            "judul_naskah" => $request->judul_naskah,
            "desc_naskah" => $request->desc_naskah,
            "kategori_naskah" => $request->kategori_naskah
        ]);

        return redirect("/penulis/master/naskah")->with('message', 'Data Naskah Berhasil Diubah!');;
    }

    public function destroy($id_naskah)
    {
        $naskah = Naskah::findOrFail($id_naskah);

        $str = $naskah->file_naskah;
        $hasil = trim($str, url('/'));

        $print = substr($hasil, 8);

        Storage::delete($print);

        $naskah->delete();

        return back()->with('message', 'Data Naskah Berhasil Dihapus!');
    }
}
