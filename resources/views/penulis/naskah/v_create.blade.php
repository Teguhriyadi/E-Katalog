@extends('layouts.main')

@section("title", "Tambah Data Naskah")

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
</div>

<form action="{{ url('/penulis/master/naskah') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fa fa-plus"></i> Tambah Data
                    </h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="judul_naskah"> Judul Naskah </label>
                        <input type="text" class="form-control" name="judul_naskah" id="judul_naskah" placeholder="Masukkan Judul Naskah">
                    </div>
                    <div class="form-group">
                        <label for="desc_naskah"> Deskripsi Naskah </label>
                        <textarea name="desc_naskah" class="form-control" id="desc_naskah" rows="5" placeholder="Masukkan Deskripsi Naskah"></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fa fa-plus"></i> Tambah Data
                    </h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="kategori_naskah"> Kategori Naskah </label>
                        <select name="kategori_naskah" class="form-control" id="kategori_naskah">
                            <option value="">- Pilih -</option>
                            <option value="1">Fiksi</option>
                            <option value="2">Non - Fiksi</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="file_naskah"> File Naskah </label>
                        <input type="file" class="form-control" name="file_naskah" id="file_naskah">
                    </div>
                </div>
                <div class="card-footer">
                    @include("admin.components.btn-tambah")
                </div>
            </div>
        </div>
    </div>
</form>

@endsection

@section("component_js")

<script src="https://cdn.ckeditor.com/ckeditor5/35.3.1/classic/ckeditor.js"></script>

<script>
    ClassicEditor
        .create( document.querySelector('#editor'));
</script>

@endsection
