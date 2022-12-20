@php
    use App\Models\PaketPreorder;
@endphp

@extends("user.main")

@section("title", "Keranjang")

@section("content")

<div class="breadcrumbs d-flex align-items-center" style="background-image: url('{{ url('/') }}/img/kategori1.jpg')">
    <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">
        <h2>Keranjang Belanja</h2>
        <ol>
            <li>
                <a href="{{ url('/') }}">Home</a>
            </li>
            <li> Data Keranjang </li>
        </ol>
    </div>
</div>

<br>
<div class="container pt-5">
    <h3>
        <i class="fa fa-shopping-cart"></i> Keranjang Belanja
        <a href="{{ url('/') }}" class="btn btn-success float-end">
            <i class="fa fa-sign-in"></i> Lanjutkan Belanja
        </a>
    </h3>
    <hr>
    <table class="table table-bordered bg-white">
        <thead>
            <tr>
				<th class="text-center">No.</th>
				<th>Nama Paket</th>
				<th class="text-center">Harga</th>
				<th class="text-center">Jumlah</th>
				<th class="text-center">Total Harga</th>
				<th class="text-center">Aksi</th>
			</tr>
        </thead>
        <tbody>
            @php
                $no = 0;
                $total_belanja = 0;
            @endphp
            @foreach ($keranjang_detail as $data)
            <tr>
                <td class="text-center">{{ ++$no }}.</td>
                <td>{{ $data->preoder->nama_paket }}</td>
                <td class="text-center">Rp. {{ number_format($data->preoder->harga_paket) }}</td>
                <td class="text-center">{{ $data->jumlah }}</td>
                <td class="text-center">Rp. {{ number_format($data->jumlah_harga) }}</td>
                <td class="text-center">
                    <a onclick="return confirm('Apakah Anda Yakin Untuk Menghapus Data Ini ? ')" href="{{ url('/hapus_keranjang/'.$data->id) }}" class="btn btn-danger btn-sm">
                        <i class="fa fa-trash"></i> Hapus
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ url('/checkout') }}" class="btn btn-primary">
        <i class="fa fa-sign-in"></i> Checkout
    </a>
</div>
<br>

@endsection
