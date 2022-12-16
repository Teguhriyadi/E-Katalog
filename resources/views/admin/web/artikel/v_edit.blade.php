@extends('layouts.main')

@section("title", "Edit Artikel")

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
                <h6 class="m-0 font-weight-bold text-primary" style="display: inline">
                    <i class="fa fa-edit"></i> @yield("title")
                </h6>
            </div>
            <form action="{{ url('/admin/web/artikel/'.$edit->id) }}" method="POST" enctype="multipart/form-data">
                @method("PUT")
                @csrf
                @php
                $str = $edit->foto;
                $hasil = trim($str, url('/'));

                $print = substr($hasil, 8);
                @endphp
                <input type="hidden" name="gambarLama" value="{{ $print }}">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <img src="{{ $edit->foto }}" class="img-fluid" style="width: 100%;">
                                <br><br>
                                <label for="foto"> Ganti Gambar </label>
                                <input type="file" class="form-control" name="foto" id="foto">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="judul"> Judul </label>
                                        <input type="text" class="form-control" name="judul" id="judul" placeholder="Masukkan Judul" value="{{ $edit->judul }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="kategori_id"> Katalog </label>
                                        <select name="kategori_id" class="form-control" id="kategori_id">
                                            <option value="">- Pilih -</option>
                                            @foreach ($katalog as $item)
                                                <option value="{{ $item->id_katalog }}" {{ $edit->kategori_id == $item->id_katalog ? 'selected' : '' }}>
                                                    {{ $item->nama_katalog }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="deskripsi"> Deskripsi </label>
                                <textarea name="deskripsi" class="form-control" id="deskripsi" rows="5" placeholder="Masukkan Deskripsi">{{ $edit->deskripsi }}</textarea>
                            </div>
                        </div>
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
