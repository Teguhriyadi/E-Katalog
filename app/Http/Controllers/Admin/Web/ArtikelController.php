<?php

namespace App\Http\Controllers\Admin\Web;

use App\Http\Controllers\Controller;
use App\Models\Katalog;
use App\Models\Web\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArtikelController extends Controller
{
    public function index()
    {
        $data["artikel"] = Artikel::orderBy("created_at", "DESC")->get();

        return view("admin.web.artikel.v_index", $data);
    }

    public function create()
    {
        $data["katalog"] = Katalog::orderBy("id_katalog", "DESC")->get();

        return view("admin.web.artikel.v_create", $data);
    }

    public function store(Request $request)
    {
        if ($request->file("foto")) {
            $data = $request->file("foto")->store("artikel");
        }

        Artikel::create([
            "slug" => Str::slug($request->judul),
            "judul" => $request->judul,
            "kategori_id" => $request->kategori_id,
            "deskripsi" => $request->deskripsi,
            "foto" => url('/storage/' . $data),
            "users_id" => Auth::user()->id_users
        ]);

        return redirect("/admin/web/artikel")->with('message', 'Data Artikel Berhasil Ditambahkan!');
    }

    public function edit($id)
    {
        $data["katalog"] = Katalog::orderBy("id_katalog", "DESC")->get();
        $data["edit"] = Artikel::where("id", $id)->first();

        return view("admin.web.artikel.v_edit", $data);
    }

    public function update(Request $request, $id)
    {
        if ($request->file("foto")) {
            if ($request->gambarLama) {
                Storage::delete($request->gambarLama);
            }

            $nama_gambar = $request->file("foto")->store("artikel");

            $data = url('/storage/' . $nama_gambar);
        } else {
            $data = url('') . "/storage/" . $request->gambarLama;
        }

        Artikel::where("id", $id)->update([
            "slug" => Str::slug($request->judul),
            "judul" => $request->judul,
            "kategori_id" => $request->kategori_id,
            "deskripsi" => $request->deskripsi,
            "foto" => url('/storage/' . $data),
            "users_id" => Auth::user()->id_users
        ]);

        return redirect("/admin/web/artikel")->with('message', 'Data Artikel Berhasil Diubah!');
    }

    public function destroy($id)
    {
        $artikel = Artikel::findOrFail($id);

        $str = $artikel->foto;
        $hasil = trim($str, url('/'));

        $print = substr($hasil, 8);

        Storage::delete($print);

        $artikel->delete();

        return back()->with('message', 'Data Artikel Berhasil Dihapus!');
    }
}
