@extends('layouts.main')

@section("title", "Syarat Ketentuan")

@section("title_breadcrumb")

<h1 class="h3 mb-0 text-gray-800">
    @yield("title")
</h1>

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

    <!-- Tambah Data -->
    <div class="col-md-12 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    @if (empty($syarat_ketentuan))
                    <i class="fa fa-plus"></i> Tambah Data
                    @else
                    <i class="fa fa-edit"></i> Edit Data
                    @endif
                </h6>
            </div>
            @if (empty($syarat_ketentuan))
            <form action="{{ url('/admin/pengaturan/syarat_ketentuan') }}" method="POST">
            @else
                <form action="{{ url('/admin/pengaturan/syarat_ketentuan/' . $syarat_ketentuan->id_syarat_ketentuan) }}" method="POST">
                    @method("PUT")
            @endif
                @csrf
                <div class="card-body">
                    <textarea name="keterangan" id="editor" cols="30" rows="10">{{ empty($syarat_ketentuan) ? '' : $syarat_ketentuan->keterangan }}</textarea>
                </div>
                <div class="card-footer">
                    @if (empty($syarat_ketentuan))
                    @include("admin.components.btn-tambah")
                    @else
                    @include("admin.components.btn-edit")
                    @endif
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
