<?php

namespace App\Http\Controllers\Admin;

use App\Models\Buku;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\BukuFormRequest;

class BukuController extends Controller
{
    //main page buku
    public function index(){
        return view('admin.buku.index');
    }

    //input data
    public function create(){
        return view('admin.buku.create');
    }

    //ngesave data  //buat save image upload //nentuin nama file ext  //nentuin tempat file move
    public function store (BukuFormRequest $request){

        $validatedData = $request->validated();
        $buku = new Buku;
        $buku->id_buku= $validatedData['id_buku'];

        if($request->hasFile('cover_buku')){
            $file = $request->file('cover_buku');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext; 
            $file->move('uploads/buku/', $filename); 
            $buku->cover_buku = $filename;
            }

        //$buku->cover_buku       = $validatedData['cover_buku'];
        $buku->judul_buku       = $validatedData['judul_buku'];
        $buku->nama_penulis     = $validatedData['nama_penulis'];
        $buku->tgl_terbit       = $validatedData['tgl_terbit'];
        $buku->halaman          = $validatedData['halaman'];
        $buku->ukuran           = $validatedData['ukuran'];
        $buku->isbn             = $validatedData['isbn'];
        $buku->keterangan_buku  = $validatedData['keterangan_buku'];
        $buku->slug             = Str::slug($validatedData['slug']);
        $buku->status_buku      = $request->status_buku == true ? '1' : '0';
        
        $buku->save();

        return redirect('admin/buku') -> with('message', 'Data Buku Berhasil Ditambahkan!');
    }

    public function edit(Buku $buku){

        return view('admin.buku.edit', compact('buku'));
        //compact bwt passing smua data di 'buku' ke file view buku/edit
    }

    //HAPUS
    public function destroy($id){
        $id = Buku::find($id);
        $id->delete();
        session()->flash('message', 'Data telah terhapus.');

        return redirect()->route('index.buku');
    }

    public function update (BukuFormRequest $request, $buku){
        //dd($buku);
        $buku = Buku::findOrFail($buku); 
        $validatedData = $request->validated(); //ngevalidasi data inputan //data yg diinput kalo valid bakal diupdate
        //list isiannya
        $buku->id_buku= $validatedData['id_buku'];
        //buat save image upload
        if($request->hasFile('cover_buku')){

            $path = 'uploads/buku/'.$buku->cover_buku;
            //ceki ni filenya ada apa ngga di path itu
            if(File::exists($path)){ 
                File::delete($path); //kalo ada di delete biar bs di replace
            }
            $file = $request->file('cover_buku');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext; //nentuin nama file
            $file->move('uploads/buku/', $filename); //nentuin tempat file
            $buku->cover_buku = $filename;
        }
        //$buku->cover_buku       = $validatedData['cover_buku'];
        $buku->judul_buku       = $validatedData['judul_buku'];
        $buku->nama_penulis     = $validatedData['nama_penulis'];
        $buku->tgl_terbit       = $validatedData['tgl_terbit'];
        $buku->halaman          = $validatedData['halaman'];
        $buku->ukuran           = $validatedData['ukuran'];
        $buku->isbn             = $validatedData['isbn'];
        $buku->keterangan_buku  = $validatedData['keterangan_buku'];
        $buku->slug             = Str::slug($validatedData['slug']);
        $buku->status_buku      = $request->status_buku == true ? '1' : '0';
        
        $buku->update(); //kalo inputannya valid bakal diupdate

        return redirect('admin/buku') -> with('message', 'Data Buku Berhasil Diubah!');

    }
}
