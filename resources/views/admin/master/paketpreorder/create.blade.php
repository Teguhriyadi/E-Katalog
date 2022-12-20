@php
    use Carbon\Carbon;
@endphp

@extends('layouts.main')

@section("title", "Tambah Paket")

@section("title_breadcrumb")

<h1 class="h3 mb-0 text-gray-800">@yield("title")</h1>

@endsection

@section("component_css")

<link href="{{ url('/theme') }}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

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
                    <i class="fa fa-plus"></i> Tambah Data
                </h6>
            </div>
            <form action="{{ url('/admin/master/paket/') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="idkatalog"> Katalog </label>
                                <select name="idkatalog" class="form-control" id="idkatalog">
                                    <option value="">- Pilih -</option>
                                    @foreach ($katalog as $item)
                                        <option value="{{ $item->id_katalog }}">
                                            {{ $item->nama_katalog }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="idbuku"> Buku </label>
                                <select name="idbuku" class="form-control" id="idbuku">
                                    <option value="">- Pilih -</option>
                                    @foreach ($listbuku as $item)
                                        <option value="{{ $item->id_buku }}">
                                            {{ $item->judul_buku }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="nama_paket"> Nama Paket </label>
                                <input type="text" class="form-control" name="nama_paket" id="nama_paket" placeholder="Masukkan Nama Paket">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="harga_paket"> Harga Paket </label>
                                <input type="number" class="form-control" name="harga_paket" id="harga_paket" placeholder="0">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="qty_paket"> QTY </label>
                                <input type="number" class="form-control" name="qty_paket" id="qty_paket" placeholder="0">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cover_paket"> Cover </label>
                                <input type="file" class="form-control" name="cover_paket" id="cover_paket">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cover_paket_gambar"> Gambar Paket </label>
                                <input type="file" class="form-control" name="cover_paket_gambar[]" id="cover_gambar_paket" multiple>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="desc_paket"> Deskripsi Paket</label>
                        <textarea name="desc_paket" class="form-control" id="desc_paket"  rows="5" placeholder="Masukkan Deskripsi Paket"></textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tanggal"> Tanggal </label>
                                <input type="datetime-local" class="form-control" name="tanggal">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="batas"> Batas </label>
                                <input type="datetime-local" class="form-control" name="batas" id="batas">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    @include("admin.components.btn-tambah")
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
