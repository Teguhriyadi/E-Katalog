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

        return view('admin.katalog.index', $data);
    }

    public function create(){
        return view('admin.katalog.create');
    }

    public function store(KatalogFormRequest $request){
        // Validasi Semua Inputan
        $validatedData = $request -> validated();

        $katalog = new Katalog;
        $katalog->id_katalog = $validatedData['id_katalog'];
        $katalog->nama_katalog = $validatedData['nama_katalog'];
        $katalog->slug = Str::slug($katalog->nama_katalog);

        $katalog->save();

        return redirect('admin/katalog') -> with('message', 'Katalog Berhasil Ditambahkan!');
    }

    public function edit(Katalog $katalog){

        return view('admin.katalog.edit', compact('katalog'));
    }

    public function destroy($id)
    {
        $id = Katalog::find($id);
        $id->delete();
        session()->flash('message', 'Data telah terhapus.');

        return back();
    }

    public function update(KatalogFormRequest $request, $katalog){
        $katalog = Katalog::findOrFail($katalog); /** cari hasil datanya dlu, trus next divalidasi */
        $validatedData = $request -> validated(); /**ngevalidasi all smua inputan */

        $katalog -> nama_katalog = $validatedData['nama_katalog'];
        $katalog -> slug = Str::slug($katalog->nama_katalog);

        $katalog -> update(); /**kalo inputannya valid bakal diupdate*/

        return redirect('admin/katalog') -> with('message', 'Katalog Berhasil Diubah!');
    }

}
