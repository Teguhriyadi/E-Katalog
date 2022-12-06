@php
use App\Models\PaketPreorder;
@endphp

@extends("user.layout.main")

@section("title", "Checkout")

@section("content")

<br>
<div class="container">
    <h4>
        <i class="fa fa-folder-open"></i> Data Checkout
    </h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="text-center">No.</th>
                <th>Nama Paket</th>
                <th class="text-center">Harga Paket</th>
                <th class="text-center">Jumlah Paket</th>
                <th class="text-center">Total Harga</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php
            $no = 0;
            $total_belanja = 0;
            @endphp
            <?php foreach ($keranjang_detail as $keranjang) : ?>
            <tr>
                <td class="text-center">{{ ++$no }}.</td>
                <td>{{ $keranjang->preoder->nama_paket }}</td>
                <td class="text-center">Rp. {{ number_format($keranjang->preoder->harga_paket) }}</td>
                <td class="text-center">{{ $keranjang->jumlah }}</td>
                <td class="text-center">Rp. {{ number_format($keranjang->jumlah_harga) }}</td>
                <td class="text-center">
                    <a onclick="return confirm('Yakin ? Anda Ingin Menghapus Data Ini ? ')" href="{{ url('/hapus_checkout/'.$keranjang->id) }}" class="btn btn-danger btn-sm">
                        <i class="fa fa-trash"></i> Hapus
                    </a>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>

    <table class="table table-bordered">
        <form action="{{ url('/checkout') }}" method="POST">
            @csrf
            <tr>
                <th colspan="2">
                    <h4>
                        <i class="fa fa-user"></i> Data Pelanggan :
                    </h4>
                </th>
            </tr>
            <tr>
                <td>Nama Pelanggan Yang Beli : </td>
                <td>
                    {{ Auth::user()->nama }}
                </td>
            </tr>
            <tr>
                <td>Telepon Pelanggan : </td>
                <td>
                    {{ Auth::user()->customer->notelp }}
                </td>
            </tr>
            <tr>
                <td>Alamat Lengkap :</td>
                <td>
                    <textarea name="alamat_lengkap" class="form-control" id="alamat_lengkap" rows="5" placeholder="Masukkan Alamat Lengkap Anda"></textarea>
                </td>
            </tr>
            <tr>
                <th colspan="2">
                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="fa fa-sign-out"></i> Checkout
                    </button>
                </th>
            </tr>
        </form>
    </table>
</div>

@endsection
