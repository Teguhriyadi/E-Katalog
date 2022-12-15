<?php

namespace App\Http\Controllers\Admin\Web;

use App\Http\Controllers\Controller;
use App\Models\Web\Carousel;
use Illuminate\Http\Request;

class CarouselController extends Controller
{
    public function index()
    {
        $data["carousel"] = Carousel::orderBy("created_at", "DESC")->get();

        return view("admin.web.carousel.v_index", $data);
    }

    public function store(Request $request)
    {
        if ($request->file("foto"))
        {
            $data = $request->file("foto")->store("carousel");
        }

        Carousel::create([
            "id_carousel" => "CRS-" . date("YmdHis"),
            "judul_carousel" => $request["judul_carousel"],
            "deskripsi" => $request["deskripsi"],
            "foto" => url('/storage/' . $data)
        ]);

        return back()->with('message', 'Data User Berhasil Ditambahkan!');
    }
}
