@php
    use Carbon\Carbon;
@endphp

@extends('layouts.main')

@section("title", "Detail Buku $detail->judul_buku ")

@section("title_breadcrumb")

<h1 class="h3 mb-0 text-gray-800">Detail Data Buku</h1>

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
    <div class="col-md-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    <i class="fa fa-image"></i> Gambar
                </h6>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <img src="{{ url('/uploads/buku/'.$detail->cover_buku) }}" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary" style="display: inline;">
                    Data @yield("title")
                </h6>
                <div style="display: inline; float: right">
                    <strong>
                        Status :
                        @if ($detail->status == 1)
                            <span class="badge badge-succes">
                                Tersedia
                            </span>
                        @elseif($detail->status == 0)
                            <span class="badge badge-danger">
                                Tidak Tersedia
                            </span>
                        @endif
                    </strong>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <div class="mb-3 row">
                        <label for="id_buku" class="form-label col-sm-5 text-right"> ID Buku : </label>
                        <div class="col-md-7">
                            {{ $detail->id_buku }}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="mb-3 row">
                        <label for="judul_buku" class="form-label col-sm-5 text-right"> Judul : </label>
                        <div class="col-md-7">
                            {{ $detail->judul_buku }}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="mb-3 row">
                        <label for="slug_buku" class="form-label col-sm-5 text-right"> Slug : </label>
                        <div class="col-md-7">
                            {{ $detail->slug }}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="mb-3 row">
                        <label for="nama_penulis" class="form-label col-sm-5 text-right"> Penulis : </label>
                        <div class="col-md-7">
                            {{ $detail->nama_penulis }}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="mb-3 row">
                        <label for="id_buku" class="form-label col-sm-5 text-right"> Tanggal Terbit : </label>
                        <div class="col-md-7">
                            {{ Carbon::createFromFormat("Y-m-d", $detail->tgl_terbit)->isoFormat('D MMMM Y') }}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="mb-3 row">
                        <label for="halaman" class="form-label col-sm-5 text-right"> Halaman : </label>
                        <div class="col-md-7">
                            {{ $detail->halaman }} Halaman
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="mb-3 row">
                        <label for="id_buku" class="form-label col-sm-5 text-right"> Ukuran : </label>
                        <div class="col-md-7">
                            {{ $detail->ukuran }}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="mb-3 row">
                        <label for="id_buku" class="form-label col-sm-5 text-right"> ISBN : </label>
                        <div class="col-md-7">
                            {{ $detail->isbn }}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="mb-3 row">
                        <label for="keterangan_buku" class="form-label col-sm-5 text-right"> Keterangan : </label>
                        <div class="col-md-7">
                            {{ $detail->keterangan_buku }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <a href="{{ url('/admin/master/buku') }}" class="btn btn-danger btn-sm btn-block">
        <i class="fa fa-times"></i> Kembali
    </a>
</div>

@endsection
