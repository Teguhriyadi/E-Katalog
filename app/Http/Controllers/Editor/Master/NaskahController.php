<?php

namespace App\Http\Controllers\Editor\Master;

use App\Http\Controllers\Controller;
use App\Models\Dokumen\Naskah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use PDF;

class NaskahController extends Controller
{
    public function index()
    {
        $data["naskah"] = Naskah::where("status_naskah", 0)->orderBy("created_at", "ASC")->get();

        return view("editor.master.naskah.v_index", $data);
    }

    public function download($id)
    {
        $naskah = Naskah::where("id_naskah", $id)->first();

        $nama = $naskah->penulis->users->nama;

        $str = $naskah->file_naskah;
        $hasil = trim($str, url('/'));

        $print = substr($hasil, 8);

        $file = public_path("storage/") . $print;

        $headers = array(
            "Content-Type: application/pdf",
        );

        return Response::download($file, "Naskah " . $nama . ".pdf", $headers);
    }
}
