@extends('layouts.main')

@section("title", "Tambah Data Voting")

@section("title_breadcrumb")

<h1 class="h3 mb-0 text-gray-800">@yield("title")</h1>

@endsection

@section('content')

<div class="row">
    <div class="col-md-6">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    <i class="fa fa-plus"></i> Tambah Data
                </h6>
            </div>
            <div class="card-body">
                <textarea name="keterangan" id="editor" cols="30" rows="10"></textarea>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    <i class="fa fa-plus"></i> Tambah Data
                </h6>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="judul_voting"> Judul </label>
                    <input type="text" class="form-control" name="judul_voting" id="judul_voting" placeholder="Masukkan Judul" value="{{ old("judul_voting") }}">
                </div>
                <div class="form-group"></div>
            </div>
            <div class="card-footer">
                @include("admin.components.btn-tambah")
            </div>
        </div>
    </div>
</div>

@endsection

@section("component_js")

<script src="https://cdn.ckeditor.com/ckeditor5/35.3.1/classic/ckeditor.js"></script>

<script>
    ClassicEditor
        .create( document.querySelector('#editor'));
</script>

@endsection
