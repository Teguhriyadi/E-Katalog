@php
    use Carbon\Carbon;
@endphp

@extends("user.main")

@section("content")

<div class="breadcrumbs d-flex align-items-center" style="background-image: url('{{ url('/') }}/img/kategori1.jpg')">
    <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">
        <h2>Nota</h2>
        <ol>
            <li>
                <a href="{{ url('/') }}">Home</a>
            </li>
            <li> Data Nota User </li>
        </ol>
    </div>
</div>

<div class="container" style="padding-top: 50px; padding-bottom: 50px;">
    <div class="card">
        <div class="card-body">
            <b>
                Nota Pembelian : {{ $transaksi->id_transaksi }}
            </b>
            <br><br>
            <div class="row">
                <div class="col-md-4">
                    <b>Alamat</b> <br><br>
                    <i class="fa fa-map-marker"></i> {{ $transaksi->alamat_pemesanan }} <br>
                    <i class="fa fa-phone"></i> {{ Auth::user()->customer->nomer_telepon  }} <br>
                    <i class="fa fa-envelope-open"></i> {{ Auth::user()->email }}
                </div>
                <div class="col-md-4">
                    <b>
                        Pembelian # {{ $transaksi->id_transaksi }}
                    </b><br><br>
                    Tanggal : <i class="fa fa-calendar"></i> {{ Carbon::createFromFormat('Y-m-d H:i:s', $transaksi->created_at)->isoFormat('LLLL') }}
                    <br>
                    Status
                    @if ($transaksi->status_pembelian == "pending")
                    <button class="btn btn-danger btn-sm">
                        <i class="fa fa-dashboard"></i> Pending
                    </button>
                    @elseif($transaksi->status_pembelian == "sudah kirim pembayaran")

                    @elseif($transaksi->status_pembelian == "barang_dikirim")

                    @elseif($transaksi->status_pembelian == "sudah_di_terima")

                    @endif
                </div>
                <div class="col-md-4">
                    <b>Pelanggan</b> <br><br>
                    <i class="fa fa-user"></i> {{ Auth::user()->nama }} <br>
                    <i class="fa fa-phone"></i> {{ Auth::user()->customer->nomer_telepon }} <br>
                    <i class="fa fa-envelope"></i> {{ Auth::user()->email }}
                </div>
            </div>
            <br>
            <table class="table table-bordered">
                <thead class="bg-dark" style="color: white;">
                    <tr>
                        <th class="text-center">No.</th>
                        <th>Nama Barang</th>
                        <th class="text-center">Harga</th>
                        <th class="text-center">Jumlah Beli</th>
                        <th class="text-center">Total Harga</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $no = 0;
                    $total_belanja = 0
                    @endphp
                    @foreach ($transaksi_paket as $item)
                    <tr>
                        <td class="text-center">{{ ++$no }}.</td>
                        <td>{{ $item->nama_paket }}</td>
                        <td class="text-center">Rp. {{ number_format($item->harga) }}</td>
                        <td class="text-center">{{ $item->jumlah }}</td>
                        <td class="text-center">
                            @php
                            $total = $item->harga * $item->jumlah;
                            $total_belanja += $item->harga * $item->jumlah
                            @endphp
                            Rp. {{ number_format($total) }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="row">
                <div class="col-md-6">
                    Silahkan melakukan pembayaran <b>Rp. {{ number_format($transaksi->total_pembelian) }} </b> ke <br><b>PT Jaya Abadi.</b> <br>
                    No. Rek : 2909-2002-2003077 <br>
                    AN : LoveAble - Publishing <br> <br>
                    Dan Melakukan konfirmasi pembayaran setelah anda membayar tagihan ini.
                </div>
                <div class="col-md-6">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th scope="row">Total Belanja</th>
                                <td colspan="3" style="padding-left: 130px;">Rp. <?php echo number_format($total_belanja); ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @if ($transaksi->status_pembelian == "pending")
        <div class="card-footer">
            <form method="POST">
                <input type="hidden" name="id_pembelian" value="{{ $transaksi->id_transksi }}">
                <button onclick="return confirm('Apakah Yakin Ingin Membatalkan Pemesanan ?')" type="submit" name="batalkan" class="btn btn-danger btn-sm" style="width: 100%;">
                    <i class="fa fa-refresh"></i> Batalkan Pesanan
                </button>
            </form>
        </div>
        @else

        @endif
    </div>
</div>

@endsection
