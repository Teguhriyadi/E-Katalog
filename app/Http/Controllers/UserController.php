<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use App\Models\KeranjangDetail;
use App\Models\PaketPreorder;
use App\Models\Pembelian;
use App\Models\Web\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function home()
    {
        $data = [
            "paket" => PaketPreorder::get(),
            "artikel" => Artikel::orderBy("created_at", "DESC")->get()
        ];

        return view("user.layout.home", $data);
    }

    public function beli(Request $request, $id_paket)
    {
        $paket = PaketPreorder::where("id_paket", $id_paket)->first();

        $cek_pesanan = Keranjang::where("user_id", Auth::user()->id_users)->where("status", 0)->first();

        if (empty($cek_pesanan)) {
            $keranjang = new Keranjang;

            $keranjang->user_id = Auth::user()->id_users;
            $keranjang->tanggal = date("Ymd");
            $keranjang->jumlah_harga = 0;
            $keranjang->status = 0;

            $keranjang->save();
        }

        $pesanan_baru = Keranjang::where("user_id", Auth::user()->id_users)->where("status", 0)->first();

        $cek_pesanan_detail = KeranjangDetail::where("id_paket", $id_paket)->where("keranjang_id", $pesanan_baru->id)->first();

        if (empty($cek_pesanan_detail)) {

            $detail = new KeranjangDetail;

            $detail->id_paket = $id_paket;
            $detail->keranjang_id = $pesanan_baru->id;
            $detail->jumlah = 1;
            $detail->jumlah_harga = $paket->harga_paket * 1;

            $detail->save();

        } else {

            $pesanan_detail = KeranjangDetail::where("id_paket", $id_paket)->where("keranjang_id", $pesanan_baru->id)->first();

            $pesanan_detail->jumlah = $pesanan_detail->jumlah + 1;

            $baru = $paket->harga_paket * 1;

            $pesanan_detail->jumlah_harga = $pesanan_detail->jumlah_harga + $baru;
            $pesanan_detail->update();
        }

        $data_keranjang = Keranjang::where("user_id", Auth::user()->id_users)->where("status", 0)->first();

        $data_keranjang->jumlah_harga = $data_keranjang->jumlah_harga + $paket->harga_paket * 1;
        $data_keranjang->update();

        return redirect("/keranjang");

    }

    public function keranjang()
    {
        $data["keranjang_detail"] = KeranjangDetail::get();

        return view("user.layout.keranjang", $data);
    }

    public function hapus_keranjang($id)
    {
        KeranjangDetail::where("id", $id)->delete();

        echo "<script>alert('Paket Terhapus');</script>";
        echo "<script>window.location='/keranjang';</script>";
    }

    public function checkout()
    {
        $data["keranjang_detail"] = KeranjangDetail::get();

        return view("user.layout.checkout", $data);
    }

    public function hapus_checkout($id)
    {
        KeranjangDetail::where("id", $id)->delete();

        echo "<script>alert('Paket Terhapus');</script>";
        echo "<script>window.location='/checkout';</script>";
    }

    public function post_checkout(Request $request)
    {
        Pembelian::create([
            "customer_id" => Auth::user()->id_users,
            "tanggal_pembelian" => date("Ymd"),
            "total_pembelian" => 5000000,
            "alamat" => $request->alamat
        ]);


    }
}
