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
    //main page paket preorder
    public function index(){
        $paketpreorder = PaketPreorder::all();
        return view('admin.paketpreorder.index', compact('paketpreorder'));
    }

    //input data
    public function create(){

        $katalogs = Katalog::all();
        $listbuku = Buku::all();
        return view('admin.paketpreorder.create', compact('katalogs', 'listbuku'));
    }

    public function store(PaketPreorderFormRequest $request){
        $validatedData = $request->validated();

        $katalog = Katalog::findOrFail($validatedData['idkatalog']);
        $paket = $katalog->paketpreorder()->create([
            'id_paket'      => $validatedData['id_paket'],
            'idkatalog'     => $validatedData['idkatalog'],
            'idbuku'        => $validatedData['idbuku'],
            'nama_paket'    => $validatedData['nama_paket'],
            'harga_paket'   => $validatedData['harga_paket'],
            'qty_paket'     => $validatedData['qty_paket'],
            'desc_paket'    => $validatedData['desc_paket'],
            'slug'          => Str::slug($validatedData['slug']), //rada error tadi
            'status_paket'  => $request->status_paket == true ? '1' :'0'
        ]);

        if($request->hasFile('cover_paket')){
            $uploadPath = 'uploads/paketpreorder/'; //tmpt simpen gambar paket

            $i = 1; //ini ttp dipake kak walau udh ada yg $gambar_paket +=1?
            $gambar_paket = date("YmdHis");
            foreach($request->file('cover_paket') as $imageFile){
                $gambar_paket += 1;
                $ext            = $imageFile->getClientOriginalExtension();
                $filename       = time().$i++.'.'.$ext; //yg ini $i nya diganti jd $gambar_paket ga ka kalo yg $i ga dipake
                $imageFile->move('$uploadPath, $filename');
                $finalImagePathName = $uploadPath.$filename;


                $paket->gambarPaket()->create([
                    'id_gambar_paket' => $gambar_paket,
                    'idpaket' => $paket->id_paket, //idpaket dari GambarPaket
                    'cover_paket' => $finalImagePathName
                ]);
            }
        }
        return redirect ('/admin/paketpreorder')->with('message', 'Data paket pre-order berhasil ditambahkan!');
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
            'slug'          => Str::slug($validatedData['slug']), //rada error tadi
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
                $finalImagePathName = $uploadPath.$filename;

                 
                $paket->gambarPaket()->create([ //buat simpen datanya
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

    //controller hapus gambar
    public function destroyImage(string $id_gambar_paket){

            $gambarPaket = GambarPaket::findOrFail($id_gambar_paket);
            if(File::exists($gambarPaket->cover_paket)){
                File::delete($gambarPaket->cover_paket);
            }
            $gambarPaket->delete();
            return redirect('admin/paketpreorder')->with('message', 'Gambar paket berhasil dihapus.');
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
}
