<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Katalog;
use App\Models\Master\Tag;
use App\Models\Pengaturan\ProfilPerusahaan;
use App\Models\Web\Artikel;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    public function detail($slug)
    {
        $data["detail"] = Artikel::where("slug", $slug)->first();
        $data["kontak"] = ProfilPerusahaan::first();
        $data["katalog"] = Katalog::orderBy("id_katalog", "DESC")->paginate(3);
        $data["tags"] = Tag::orderBy("created_at", "DESC")->get();
        $data["artikel"] = Artikel::where("slug", "!=", $slug)->orderBy("created_at", "DESC")->paginate(5);

        return view("user.artikel.v_detail", $data);
    }
}
