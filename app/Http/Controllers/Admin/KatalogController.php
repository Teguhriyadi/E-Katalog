<?php

namespace App\Http\Controllers\Admin;

use App\Models\Katalog;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\KatalogFormRequest;

class KatalogController extends Controller
{
    public function index()
    {
        $data["katalogs"] = Katalog::get();

        return view('admin.master.katalog.v_index', $data);
    }

    public function store(KatalogFormRequest $request)
    {
        // Validasi Semua Inputan
        $validatedData = $request -> validated();

        $katalog = new Katalog;
        $katalog->id_katalog = $validatedData['id_katalog'];
        $katalog->nama_katalog = $validatedData['nama_katalog'];
        $katalog->slug = Str::slug($katalog->nama_katalog);

        $katalog->save();

        return back()->with('message', 'Katalog Berhasil Ditambahkan!');
    }

    public function update(KatalogFormRequest $request, $id_katalog)
    {
        $katalog = Katalog::findOrFail($id_katalog); /** cari hasil datanya dlu, trus next divalidasi */
        $validatedData = $request -> validated(); /**ngevalidasi all smua inputan */

        $katalog->nama_katalog = $validatedData['nama_katalog'];
        $katalog->slug = Str::slug($katalog->nama_katalog);

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
