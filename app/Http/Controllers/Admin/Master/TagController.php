<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use App\Models\Master\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TagController extends Controller
{
    public function message()
    {
        $message = [
            "unique" => "Kolom :attribute Tidak Boleh Sama",
            "required" => "Kolom :attribute Tidak Boleh Kosong"
        ];

        return $message;
    }

    public function index()
    {
        $data["tags"] = Tag::orderBy("created_at", "DESC")->get();

        return view("admin.master.tag.v_index", $data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            "nama" => "required|unique:tag"
        ], $this->message());

        Tag::create([
            "nama" => $request->nama,
            "slug" => Str::slug($request->nama)
        ]);

        return back()->with('message', 'Tag Berhasil Ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            "nama" => "required|unique:tag"
        ], $this->message());

        Tag::where("id", $id)->update([
            "nama" => $request->nama,
            "slug" => Str::slug($request->nama)
        ]);

        return back()->with('message', 'Tag Berhasil Diubah!');
    }

    public function destroy($id)
    {
        Tag::where("id", $id)->delete();

        return back()->with('message', 'Tag Berhasil Dihapus!');
    }
}
