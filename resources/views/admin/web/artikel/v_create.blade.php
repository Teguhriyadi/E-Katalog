@extends('layouts.main')

@section("title", "Tambah Artikel")

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
                    <i class="fa fa-plus"></i> @yield("title")
                </h6>
            </div>
            <form action="{{ url('/admin/web/artikel') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="foto"> Foto </label>
                                <input type="file" class="form-control" name="foto" id="foto">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="judul"> Judul </label>
                                        <input type="text" class="form-control" name="judul" id="judul" placeholder="Masukkan Judul">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="kategori_id"> Katalog </label>
                                        <select name="kategori_id" class="form-control" id="kategori_id">
                                            <option value="">- Pilih -</option>
                                            @foreach ($katalog as $item)
                                                <option value="{{ $item->id_katalog }}">
                                                    {{ $item->nama_katalog }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="deskripsi"> Deskripsi </label>
                                <textarea name="deskripsi" class="form-control" id="deskripsi" rows="5" placeholder="Masukkan Deskripsi"></textarea>
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
