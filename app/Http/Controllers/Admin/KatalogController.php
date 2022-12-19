<?php

namespace App\Http\Controllers\Admin;

use App\Models\Katalog;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KatalogController extends Controller
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
        $data["katalogs"] = Katalog::get();

        return view('admin.master.katalog.v_index', $data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            "id_katalog" => "required|unique:katalog_produk",
            "nama_katalog" => "required"
        ], $this->message());

        $katalog = new Katalog;
        $katalog->id_katalog = $request['id_katalog'];
        $katalog->nama_katalog = $request['nama_katalog'];
        $katalog->slug = Str::slug($katalog->nama_katalog);

        $katalog->save();

        return back()->with('message', 'Katalog Berhasil Ditambahkan!');
    }

    public function update(Request $request, $id_katalog)
    {
        $this->validate($request, [
            "nama_katalog" => "required"
        ], $this->message());

        $katalog = Katalog::findOrFail($id_katalog); /** cari hasil datanya dlu, trus next divalidasi */

        $katalog->nama_katalog = $request['nama_katalog'];
        $katalog->slug = Str::slug($request->nama_katalog);

        $katalog->update(); /**kalo inputannya valid bakal diupdate*/

        return back()->with('message', 'Katalog Berhasil Diubah!');
    }

    public function destroy($id_katalog)
    {
        $id = Katalog::find($id_katalog);
        $id->delete();

        return back()->with('message', 'Katalog Berhasil Diubah!');;
    }

}
