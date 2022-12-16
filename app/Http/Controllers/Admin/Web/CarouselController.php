<?php

namespace App\Http\Controllers\Admin\Web;

use App\Http\Controllers\Controller;
use App\Models\Web\Carousel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

        return back()->with('message', 'Data Gambar Carousel Berhasil Ditambahkan!');
    }

    public function update(Request $request, $id_carousel)
    {
        if ($request->file("foto")) {
            if ($request->gambarLama) {
                Storage::delete($request->gambarLama);
            }

            $nama_gambar = $request->file("foto")->store("carousel");

            $data = url('/storage/' . $nama_gambar);
        } else {
            $data = url('') . "/storage/" . $request->gambarLama;
        }

        Carousel::where("id_carousel", $id_carousel)->update([
            "judul_carousel" => $request->judul_carousel,
            "deskripsi" => $request->deskripsi,
            "foto" => $data
        ]);

        return back()->with('message', 'Data Gambar Carousel Berhasil Diubah!');
    }

    public function destroy(string $id_carousel)
    {
        $carousel = Carousel::findOrFail($id_carousel);

        $str = $carousel->foto;
        $hasil = trim($str, url('/'));

        $print = substr($hasil, 8);

        Storage::delete($print);

        $carousel->delete();

        return back()->with('message', 'Data Gambar Carousel Berhasil Dihapus!');
    }
}
