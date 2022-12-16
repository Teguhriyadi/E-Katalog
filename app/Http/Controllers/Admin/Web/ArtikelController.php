<?php

namespace App\Http\Controllers\Admin\Web;

use App\Http\Controllers\Controller;
use App\Models\Web\Artikel;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    public function index()
    {
        $data["artikel"] = Artikel::orderBy("created_at", "DESC")->get();

        return view("admin.web.artikel.v_index", $data);
    }
}
