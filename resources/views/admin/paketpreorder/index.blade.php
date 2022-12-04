@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class = "card">
            @if(session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <div class = "card-header">
                <h3> Data Paket Pre-Order
                    <a href = "{{ url('admin/paketpreorder/create') }}" class = "btn btn-primary btn-sm text-white float-end">
                        Tambah Paket</a>
                </h3>
            </div>

            <div class = "card-body table-responsive">
                <table class = "table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Kode Paket</th>
                            <th>Jenis Katalog</th>
                            <th>Nama Paket</th>
                            <th>Judul Buku</th>
                            <th>Harga Paket</th>
                            <th>Kuantitas</th>
                            <th>Deskripsi</th>
                            <th>Slug</th>
                            <th>Status Paket</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($paketpreorder as $paket) {{-- paktepreorder (collection), paket (object bwt di GET) --}}
                            <tr>
                                <td>{{ $paket->id_paket }}</td>
                                <td>
                                    @if($paket->katalog) {{-- exception kalo nama katalog gaada --}}
                                        {{ $paket->katalog->nama_katalog }}{{-- belongsTo Katalog class, show nama katalog --}}
                                    @else
                                        Katalog Tidak Ditemukan
                                    @endif
                                </td> 
                                <td>{{ $paket->nama_paket }}</td>
                                <td>
                                    @if ($paket->buku) {{-- exception  --}}
                                        {{ $paket->buku->judul_buku }}  {{-- belongsTo dr Buku::class --}}
                                    @else
                                    Judul Buku Tidak Ditemukan {{-- kalo gaada bukunya --}}
                                    @endif
                                </td>
                                <td>{{ $paket->harga_paket }}</td>
                                <td>{{ $paket->qty_paket }}</td>
                                <td>{{ $paket->desc_paket }}</td>
                                <td>{{ $paket->slug }}</td>
                                <td>{{ $paket->status_paket == '1' ? 'Tersedia' : '' }}</td>
                                <td>
                                    <a href = "{{ url('admin/paketpreorder/'.$paket->id_paket.'/edit') }}" class = "btn btn-success">Ubah</a>
                                    <!-- a href = class = "btn btn-danger" data-id="{ { $paket->id_paket }}">Hapus</!-->
                                    <a href = "{{ url('admin/paketpreorder/'.$paket->id_paket.'/delete') }}" onclick = "return confirm('Anda yakin ingin menghapus data ini?')" class = "btn btn-danger">Hapus</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan = "10"> Tidak ada paket!</td>

                            </tr>
                            
                        @endforelse
                        
                    </tbody>
                </table>


            </div>

@endsection