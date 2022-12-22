@extends('layouts.main')

@section("title", "Tambah Data Voting")

@section("title_breadcrumb")

<h1 class="h3 mb-0 text-gray-800">@yield("title")</h1>

@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    <i class="fa fa-plus"></i> Tambah Data
                </h6>
            </div>
            <form action="{{ url('/editor/voting/pembaca') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="url_voting"> URL Voting </label>
                        <input type="url" class="form-control" name="url_voting" id="url_voting" placeholder="Masukkan Judul" value="{{ old("url_voting") }}">
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

@section("component_js")

<script src="https://cdn.ckeditor.com/ckeditor5/35.3.1/classic/ckeditor.js"></script>

<script>
    ClassicEditor
        .create( document.querySelector('#editor'));
</script>

@endsection
