@php
use App\Models\PaketPreorder;
@endphp

@extends("user.main")

@section("title", "Checkout")

@section("content")

<div class="breadcrumbs d-flex align-items-center" style="background-image: url('{{ url('/') }}/img/kategori1.jpg')">
    <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">
        <h2>Checkout</h2>
        <ol>
            <li>
                <a href="{{ url('/') }}">Home</a>
            </li>
            <li> Data Checkout </li>
        </ol>
    </div>
</div>

<br>
<div class="container pt-3">
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
            <thead>
                <tr>
                    <th colspan="2">
                        <h5>
                            Data Pelanggan
                        </h5>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Nama Pelanggan Yang Beli:</td>
                    <td>
                        {{ Auth::user()->nama }}
                    </td>
                </tr>
                <tr>
                    <td>Telepon Pelanggan : </td>
                    <td>
                        {{ Auth::user()->customer->nomer_telepon }}
                    </td>
                </tr>
            </tbody>
            <tr>
                <td>Alamat Lengkap :</td>
                <td>
                    <textarea name="alamat" class="form-control" id="alamat" rows="5" placeholder="Masukkan Alamat Lengkap Anda"></textarea>
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
