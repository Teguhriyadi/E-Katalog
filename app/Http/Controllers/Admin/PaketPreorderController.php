<?php

namespace App\Http\Controllers\Admin;

use App\Models\Buku;
use App\Models\Katalog;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use App\Http\Requests\PaketPreorderFormRequest;
use App\Models\GambarPaket;
use App\Models\PaketPreorder;
use PDO;

class PaketPreorderController extends Controller
{
    public function index()
    {
        $paketpreorder = PaketPreorder::all();

        return view("admin.master.paketpreorder.index", compact('paketpreorder'));
    }

    public function create()
    {
        $katalog = Katalog::all();
        $listbuku = Buku::all();

        return view("admin.master.paketpreorder.create", compact('katalog', 'listbuku'));
    }

    public function store(Request $request)
    {
        if ($request->file("cover_paket")) {
            $data = $request->file("cover_paket")->store("cover_paket");
        }

        $paket = PaketPreorder::create([
            "id_paket" => "PKT-" . date("YmdHis"),
            "idkatalog" => $request->idkatalog,
            "idbuku" => $request->idbuku,
            "cover_paket" => url("/storage/".$data),
            "nama_paket" => $request->nama_paket,
            "harga_paket" => $request->harga_paket,
            "qty_paket" => $request->qty_paket,
            "desc_paket" => $request->desc_paket,
            "slug" => Str::slug($request->nama_paket),
            "tanggal" => $request->tanggal,
            "batas" => $request->batas
        ]);

        if($request->hasFile('cover_paket')){
            $uploadPath = 'uploads/paketpreorder/';

            $i = 1;
            $gambar_paket = date("YmdHis");
            foreach($request->file('cover_paket_gambar') as $imageFile){
                $gambar_paket += 1;
                $ext            = $imageFile->getClientOriginalExtension();
                $filename       = time().$i++.'.'.$ext;
                $imageFile->move($uploadPath, $filename);
                $finalImagePathName = $filename;


                $paket->gambarPaket()->create([
                    'id_gambar_paket' => $gambar_paket,
                    'idpaket' => $paket->id_paket,
                    'cover_paket' => $finalImagePathName
                ]);
            }
        }
        return redirect ('/admin/master/paket')->with('message', 'Data paket pre-order berhasil ditambahkan!');
    }

    public function edit (string $id_paket){
        $katalogs = Katalog::all();
        $listbuku = Buku::all();
        $paket = PaketPreorder::findOrFail($id_paket);
        return view ('admin.paketpreorder.edit', compact('katalogs', 'listbuku', 'paket'));
    }

    public function update (PaketPreorderFormRequest $request, string $id_paket){

        $validatedData = $request->validated();

        $paket = Katalog::findOrFail($validatedData['idkatalog'])
        ->paketpreorder()->where('id_paket', $id_paket)->first();
        if($paket){

            $paket->update([
                'id_paket'      => $validatedData['id_paket'],
                'idkatalog'     => $validatedData['idkatalog'],
                'idbuku'        => $validatedData['idbuku'],
                'nama_paket'    => $validatedData['nama_paket'],
                'harga_paket'   => $validatedData['harga_paket'],
                'qty_paket'     => $validatedData['qty_paket'],
                'desc_paket'    => $validatedData['desc_paket'],
                'slug'          => Str::slug($validatedData['nama_paket']), //rada error tadi
                'status_paket'  => $request->status_paket == true ? '1' :'0'
            ]);

            if($request->hasFile('cover_paket')){
                $uploadPath = 'uploads/paketpreorder/';

                $i = 1; //$gambarpaket = 1 ??
                $gambar_paket = date("YmdHis");
                foreach($request->file('cover_paket') as $imageFile){
                    $gambar_paket += 1;
                    $ext            = $imageFile->getClientOriginalExtension();
                    $filename       = time().$i++.'.'.$ext; //time().$gambarpaket++.'.'.$ext; ??
                    $imageFile->move($uploadPath, $filename);
                    $finalImagePathName = $filename;

                    $paket->gambarPaket()->create([
                        'id_gambar_paket' => $gambar_paket,
                        'idpaket' => $paket->id_paket, //idpaket dari GambarPaket
                        'cover_paket' => $finalImagePathName
                    ]);
                }
            }
            return redirect ('/admin/paketpreorder')->with('message', 'Data paket pre-order berhasil ditambahkan!');
        }

        else{
            return redirect('admin/paketpreorder')->with('message', 'Produk tidak ditemukan');
        }
    }

    public function destroy(string $id_paket){
        $paket = PaketPreorder::findOrFail($id_paket);
        if($paket->gambarPaket){
            foreach($paket->gambarPaket as $cover_paket){
                if(File::exists($cover_paket->cover_paket)){
                    File::delete($cover_paket->cover_paket);
                }
            }
        }
        $paket->delete();
        return redirect()->back()->with('message', 'Data paket berserta gambar telah terhapus.');

    }

    public function hapus_gambar_paket($id_gambar_paket)
    {
        $gambar_paket = GambarPaket::where("id_gambar_paket", $id_gambar_paket)->first();
        $path = "uploads/paketpreorder/" . $gambar_paket->cover_paket;
        if (File::exists($path)) {
            File::delete($path);
        }

        $gambar_paket->delete();

        return back()->with('message', 'Gambar paket berhasil dihapus.');
    }
}
