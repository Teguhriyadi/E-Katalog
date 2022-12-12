<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use App\Models\Master\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TagController extends Controller
{
    public function index()
    {
        $data["tags"] = Tag::orderBy("created_at", "DESC")->get();

        return view("admin.master.tag.v_index", $data);
    }

    public function store(Request $request)
    {
        Tag::create([
            "nama" => $request->nama,
            "slug" => Str::slug($request->nama)
        ]);

        return back()->with('message', 'Tag Berhasil Ditambahkan!');
    }

    public function update(Request $request, $id)
    {
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
