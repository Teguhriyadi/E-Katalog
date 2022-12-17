<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Katalog;
use App\Models\Pengaturan\ProfilPerusahaan;
use App\Models\Web\Artikel;
use Illuminate\Http\Request;

class KatalogController extends Controller
{
    public function detail($slug)
    {
        $data["katalog"] = Katalog::where("slug", $slug)->first();

        $data["produk"] = Artikel::where("kategori_id", $data["katalog"]["id_katalog"])->paginate(6);

        $data["filter_katalog"] = Katalog::where("slug", "!=", $slug)->get();
        $data["terbaru"] = Artikel::where("kategori_id", "!=", $data["katalog"]["id_katalog"])->paginate(6);
        $data["kontak"] = ProfilPerusahaan::first();

        return view("user.katalog.v_detail_katalog", $data);
    }
}
