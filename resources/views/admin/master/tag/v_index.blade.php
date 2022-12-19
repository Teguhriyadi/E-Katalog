@extends('layouts.main')

@section("title", "Tags")

@section("title_breadcrumb")

<h1 class="h3 mb-0 text-gray-800">Tags</h1>

@endsection

@section("component_css")

<link href="{{ url('/theme') }}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

@endsection

@section('content')

<div class="row">
    @if (count($errors) > 0)
    <div class="col-md-12">
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
    @endif
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
    <div class="col-md-4 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    <i class="fa fa-plus"></i> Tambah Data
                </h6>
            </div>
            <form action="{{ url('/admin/master/tag') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama"> Nama </label>
                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama" value="{{ old('nama') }}">
                    </div>
                </div>
                <div class="card-footer">
                    @include("admin.components.btn-tambah")
                </div>
            </form>
        </div>
    </div>
    <!-- END Form Tambah Data -->

    <!-- Tabel -->
    <div class="col-md-8">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    Data @yield("title")
                </h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="text-center">No.</th>
                                <th class="text-center">Nama</th>
                                <th class="text-center">Slug</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $no = 0
                            @endphp
                            @foreach ($tags as $item)
                            <tr>
                                <td class="text-center">{{ ++$no }}.</td>
                                <td class="text-center">{{ $item->nama }}</td>
                                <td class="text-center">{{ $item->slug }}</td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#exampleModalEdit-{{ $item->id }}">
                                        <i class="fa fa-edit"></i> Edit
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModalHapus-{{ $item->id }}">
                                        <i class="fa fa-trash"></i> Hapus
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- END Tabel -->
</div>

<!-- Modal Edit -->
@foreach ($tags as $item)
<div class="modal fade" id="exampleModalEdit-{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    <i class="fa fa-edit"></i> Edit Data
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ url('/admin/master/tag/'.$item->id) }}" method="POST">
                @method("PUT")
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama"> Nama </label>
                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama" value="{{ old('nama') ?? $item->nama }}">
                    </div>
                </div>
                <div class="modal-footer">
                    @include("admin.components.btn-edit")
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
<!-- END -->

<!-- Modal Hapus -->
@foreach ($tags as $item)
<div class="modal fade" id="exampleModalHapus-{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    <i class="fa fa-trash"></i> Hapus Data
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ url('/admin/master/tag/'.$item->id) }}" method="POST">
                @method("DELETE")
                @csrf
                <div class="modal-body">
                    <p>
                        Apakah Anda Yakin Untuk Menghapus Data
                        <strong>{{ $item->nama }}</strong> ?
                    </p>
                </div>
                <div class="modal-footer">
                    @include("admin.components.btn-hapus")
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
<!-- END -->

@endsection

@section("component_js")

<script src="{{ url('/theme') }}/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="{{ url('/theme') }}/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="{{ url('/theme') }}/js/demo/datatables-demo.js"></script>

@endsection
