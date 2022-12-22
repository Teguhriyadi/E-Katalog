<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use App\Models\KeranjangDetail;
use App\Models\Master\Pesan;
use App\Models\PaketPreorder;
use App\Models\Pembelian;
use App\Models\Pengaturan\ProfilPerusahaan;
use App\Models\Transaksi\PembelianTransaksi;
use App\Models\Transaksi\PembelianTransaksiPaket;
use App\Models\Web\Artikel;
use App\Models\Web\Carousel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function home()
    {
        $data = [
            "paket" => PaketPreorder::get(),
            "artikel" => Artikel::orderBy("created_at", "DESC")->get(),
            "carousel" => Carousel::orderBy("created_at", "DESC")->paginate(3),
            "kontak" => ProfilPerusahaan::first()
        ];

        return view("user.layout.home", $data);
    }

    public function kirim_pesan(Request $request)
    {
        Pesan::create([
            "id_pesan" => "PSN-" . date("YmdHis"),
            "nama" => $request->nama,
            "email" => $request->email,
            "subjek" => $request->subjek,
            "pesan" => $request->pesan
        ]);

        return back();
    }

    public function beli(Request $request, $id_paket)
    {
        if (empty(Auth::user())) {
            $session = session()->put("login", "Cetak");

            return redirect("/login")->with($session);
        }
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
        $data["kontak"] = ProfilPerusahaan::first();
        $data["keranjang_detail"] = KeranjangDetail::get();

        if ($data["keranjang_detail"]->count() > 0) {
            return view("user.layout.keranjang", $data);
        } else {
            return redirect("/");
        }

    }

    public function hapus_keranjang($id)
    {
        KeranjangDetail::where("id", $id)->delete();

        echo "<script>alert('Sukses, Data Paket Berhasil Terhapus');</script>";
        echo "<script>window.location='/keranjang';</script>";
    }

    public function checkout()
    {
        $data["keranjang_detail"] = KeranjangDetail::get();
        $data["kontak"] = ProfilPerusahaan::first();

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
        $keranjang = Keranjang::where("user_id", Auth::user()->id_users)->first();

        $detail_keranjang = KeranjangDetail::where("keranjang_id", $keranjang->id)->get();

        $transaksi_id = PembelianTransaksi::create([
            "id_transaksi" => "TRN-" . date("YmdHis"),
            "customer_id" => Auth::user()->id_users,
            "tanggal_pembelian" => date("YmdHis"),
            "total_pembelian" => $keranjang->jumlah_harga,
            "alamat_pemesanan" => $request->alamat,
            "status_pembelian" => "pending"
        ]);

        $nomer = 1;
        foreach ($detail_keranjang as $detail) {
            PembelianTransaksiPaket::create([
                "id_pembelian_paket" => "TRP-". date("YmdHis"). ++$nomer,
                "id_transaksi" => $transaksi_id->id_transaksi,
                "kode_paket" => $detail->id_paket,
                "jumlah" => $detail->jumlah,
                "nama_paket" => $detail->preoder->nama_paket,
                "harga" => 100
            ]);
        }

        return redirect("/nota/" . $transaksi_id->id_transaksi);
    }

    public function nota($transaksi_id)
    {
        $data["kontak"] = ProfilPerusahaan::first();
        $data["transaksi"] = PembelianTransaksi::where("id_transaksi", $transaksi_id)->first();
        $data["transaksi_paket"] = PembelianTransaksiPaket::where("id_transaksi", $transaksi_id)->get();

        return view("user.layout.nota", $data);
    }

    public function riwayat_belanja()
    {
        $data["kontak"] = ProfilPerusahaan::first();
        $data["transaksi"] = PembelianTransaksi::where("customer_id", Auth::user()->id_users)->get();

        return view("user.layout.riwayat_belanja", $data);
    }

    public function logout_user()
    {
        if (Auth::user()->role == "customer")
        {
            Auth::logout();

            return redirect("/");
        }
    }
}
