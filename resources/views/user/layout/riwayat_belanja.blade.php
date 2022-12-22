@php
    use Carbon\Carbon;
@endphp

@extends("user.main")

@section("content")

<div class="breadcrumbs d-flex align-items-center" style="background-image: url('{{ url('/') }}/img/kategori1.jpg')">
    <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">
        <h2>Riwayat Belanja</h2>
        <ol>
            <li>
                <a href="{{ url('/') }}">Home</a>
            </li>
            <li> Data Riwayat Belanja User </li>
        </ol>
    </div>
</div>

<div class="container" style="padding-top: 50px; padding-bottom: 50px;">
	<h4><i class="fa fa-pencil"></i> Riwayat Keranjang Belanja {{ Auth::user()->nama }} </h4>
	<hr>
	<table class="table table-bordered bg-white">
		<thead>
			<tr>
				<th class="text-center">No.</th>
				<th class="text-center">Tanggal Pembelian</th>
				<th class="text-center">Status</th>
				<th class="text-center">Total Belanja</th>
				<th class="text-center">Aksi</th>
			</tr>
		</thead>
        <tbody>
            @php
                $no = 0
            @endphp
            @foreach ($transaksi as $item)
            <tr>
                <td class="text-center">{{ ++$no }}.</td>
                <td class="text-center">{{ Carbon::createFromFormat('Y-m-d H:i:s', $item->created_at)->isoFormat('LLLL') }}</td>
                <td class="text-center">
                    @if ($item->status_pembelian == "pending")
                        Pending
                    @elseif($item->status_pembelian == "barang_dikirim")
                        Barang Dikirim
                    @elseif($item->status_pembelian == "sudah kirim pembayaran")
                        Sudah Kirim Pembayaran
                    @elseif($item->status_pembelian == "sudah_di_terima")
                        Sudah Di Terima
                    @endif
                    <br>
                    @if (!empty($item->resi_pengiriman))
                        Resi : {{ $item->resi_pengiriman }}
                    @endif
                </td>
                <td class="text-center">Rp. {{ number_format($item->total_pembelian) }}</td>
                <td class="text-center">
                    <a href="{{ url('/nota/'.$item->id_transaksi) }}" class="btn btn-info btn-sm">
                        <i class="fa fa-search"></i> Lihat Nota
                    </a>
                    @if ($item->status_pembelian == "pending")
                        <a class="btn btn-success btn-sm" href="{{ url('/pembayaran/'.$item->id_transaksi) }}">
                            <i class="fa fa-money"></i> Bayar
                        </a>
                    @else
                    <a href="{{ url('/lihat_pembayaran/'.$item->id_transaksi) }}">
                        <i class="fa fa-search"></i> Lihat Pembayaran
                    </a>
                    <form action="{{ url('/') }}" method="POST">
                        @csrf
                        @if ($item->status_pembelian == "sudah di terima")

                        @elseif($item->status_pembelian == "sudah kirim pembayaran")

                        @else
                            <button type="submit" class="btn btn-da btn-sm">
                                Sudah Di Terima ?
                            </button>
                        @endif
                    </form>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
