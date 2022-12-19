<?php

namespace App\Http\Controllers\Admin;

use App\Models\Buku;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class BukuController extends Controller
{
    public function message()
    {
        $message = [
            "unique" => "Kolom :attribute Tidak Boleh Sama",
            "required" => "Kolom :attribute Tidak Boleh Kosong",
            "image" => "Kolom :attribute Harus Berbentuk Gambar",
            "mimes" => "Kolom :attribute Tidak Mengandung Ekstensi Yang Dibutuhkan"
        ];

        return $message;
    }
    //main page buku
    public function index()
    {
        $data["buku"] = Buku::get();

        return view("admin.master.buku.v_index", $data);
    }

    //input data
    public function create()
    {
        return view("admin.master.buku.v_create");
    }

    //ngesave data  //buat save image upload //nentuin nama file ext  //nentuin tempat file move
    public function store (Request $request)
    {
        $this->validate($request, [
            "id_buku" => "required|unique:databuku",
            "judul_buku" => "required",
            "nama_penulis" => "required",
            "tgl_terbit" => "required",
            "halaman" => "required",
            "ukuran" => "required",
            "isbn" => "required",
            "cover_buku" => "required|image|mimes:jpg,png,jpeg|max:2048",
            "keterangan_buku" => "required",
            "status_buku" => "required"
        ], $this->message());

        $buku = new Buku;
        $buku->id_buku= $request['id_buku'];

        if($request->hasFile('cover_buku')){
            $file = $request->file('cover_buku');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/buku/', $filename);
            $buku->cover_buku = $filename;
        }

        $buku->judul_buku       = $request['judul_buku'];
        $buku->nama_penulis     = $request['nama_penulis'];
        $buku->tgl_terbit       = $request['tgl_terbit'];
        $buku->halaman          = $request['halaman'];
        $buku->ukuran           = $request['ukuran'];
        $buku->isbn             = $request['isbn'];
        $buku->keterangan_buku  = $request['keterangan_buku'];
        $buku->slug             = Str::slug($buku->judul_buku);
        $buku->status_buku      = $request->status_buku == true ? '1' : '0';

        $buku->save();

        return back()->with('message', 'Data Buku Berhasil Ditambahkan!');
    }

    public function show($id_buku)
    {
        $data["detail"] = Buku::where("id_buku", $id_buku)->first();

        return view("admin.master.buku.v_detail", $data);
    }

    public function edit(Buku $buku)
    {
        return view('admin.master.buku.v_edit', compact('buku'));
        //compact bwt passing smua data di 'buku' ke file view buku/edit
    }

    public function update (Request $request, $buku)
    {
        $this->validate($request, [
            "id_buku" => "required|unique:databuku",
            "judul_buku" => "required",
            "nama_penulis" => "required",
            "tgl_terbit" => "required",
            "halaman" => "required",
            "ukuran" => "required",
            "isbn" => "required",
            "cover_buku" => "required|image|mimes:jpg,png,jpeg|max:2048",
            "keterangan_buku" => "required",
            "status_buku" => "required"
        ], $this->message());

        $buku = Buku::findOrFail($buku);

        //list isiannya
        $buku->id_buku= $request['id_buku'];
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
        //$buku->cover_buku       = $request['cover_buku'];
        $buku->judul_buku       = $request['judul_buku'];
        $buku->nama_penulis     = $request['nama_penulis'];
        $buku->tgl_terbit       = $request['tgl_terbit'];
        $buku->halaman          = $request['halaman'];
        $buku->ukuran           = $request['ukuran'];
        $buku->isbn             = $request['isbn'];
        $buku->keterangan_buku  = $request['keterangan_buku'];
        $buku->slug             = Str::slug($buku->judul_buku);
        $buku->status_buku      = $request->status_buku == true ? '1' : '0';

        $buku->update(); //kalo inputannya valid bakal diupdate

        return redirect("/admin/master/buku")->with('message', 'Data Buku Berhasil Diubah!');
    }

    //HAPUS
    public function destroy($id){
        $id = Buku::find($id);
        $path = "uploads/buku/" . $id->cover_buku;
        if (File::exists($path)) {
            File::delete($path);
        }

        $id->delete();
        session()->flash('message', 'Data telah terhapus.');

        return back();
    }
}
