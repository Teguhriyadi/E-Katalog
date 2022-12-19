@php
    use Carbon\Carbon;
@endphp

@extends('layouts.main')

@section("title", "Edit Buku")

@section("title_breadcrumb")

<h1 class="h3 mb-0 text-gray-800">Edit Data Buku</h1>

@endsection

@section('content')

<div class="row">
    <!-- Menampilkan Pesan -->
    <div class="col-md-12">
        @if(session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
        @endif
    </div>
    <!-- END Pesan -->

    <!-- Tabel -->
    <div class="col-md-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary" style="display: inline;">
                    Data @yield("title")
                </h6>
                <div style="display: inline; float: right;">
                    <a href="{{ url('/admin/master/buku') }}" class="btn btn-info btn-sm">
                        Kembali
                    </a>
                </div>
            </div>
            <form action="{{ url('/admin/master/buku/'.$buku->id_buku) }}" method="POST" enctype="multipart/form-data">
                @method("PUT")
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="id_buku"> ID Buku </label>
                                <input type="text" class="form-control" name="id_buku" id="id_buku" placeholder="Masukkan ID Buku" value="{{ $buku->id_buku }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="status_buku"> Status Buku </label>
                                <select name="status_buku" class="form-control" id="status_buku">
                                    <option value="">- Pilih -</option>
                                    <option value="1" {{ old('status_buku', $buku->status_buku) == '1' ? 'selected' : '' }} >- Tersedia -</option>
                                    <option value="0" {{ old('status_buku', $buku->status_buku) == '0' ? 'selected' : '' }} >- Tidak Tersedia -</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="judul_buku"> Judul Buku </label>
                                <input type="text" class="form-control" name="judul_buku" id="judul_buku" placeholder="Masukkan Judul Buku" value="{{ old("judul_buku") ?? $buku->judul_buku }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama_penulis"> Nama Penulis </label>
                                <input type="text" class="form-control" name="nama_penulis" id="nama_penulis" placeholder="Masukkan Nama Penulis" value="{{ old("nama_penulis") ?? $buku->nama_penulis }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="tgl_terbit"> Tanggal Terbit </label>
                                <input type="date" class="form-control" name="tgl_terbit" id="tgl_terbit" value="{{ old("tgl_terbit") ?? $buku->tgl_terbit }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="halaman"> Halaman </label>
                                <input type="number" class="form-control" name="halaman" id="halaman" placeholder="Masukkan Jumlah Halaman" min="1" value="{{ old("halaman") ?? $buku->halaman }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="ukuran"> Ukuran </label>
                                <input type="text" class="form-control" name="ukuran" id="ukuran" placeholder="Masukkan Ukuran Buku" value="{{ old("ukuran") ?? $buku->ukuran }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="image"> Gambar </label>
                        <br>
                        <img src="{{ url('/uploads/buku/'.$buku->cover_buku) }}" class="img-fluid" style="width: 30%">
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="isbn"> ISBN </label>
                                <input type="text" class="form-control" name="isbn" id="isbn" placeholder="Masukkan ISBN" value="{{ old("isbn") ?? $buku->isbn }}">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="cover_buku">
                                    Cover Buku
                                    <small>
                                        <span class="text-danger">
                                            <i>(Extensi : JPG, PNG) | MAX : (2048)</i>
                                        </span>
                                    </small>
                                </label>
                                <input type="file" class="form-control" name="cover_buku" id="cover_buku">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="keterangan"> Keterangan </label>
                        <textarea name="keterangan_buku" id="keterangan_buku" class="form-control" rows="5" placeholder="Masukkkan Keterangan Buku">{{ old("keterangan_buku") ?? $buku->keterangan_buku }}</textarea>
                    </div>
                </div>
                <div class="card-footer">
                    @include("admin.components.btn-edit")
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
