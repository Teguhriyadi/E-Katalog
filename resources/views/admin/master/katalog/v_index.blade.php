@extends('layouts.main')

@section("title", "Katalog")

@section("title_breadcrumb")

<h1 class="h3 mb-0 text-gray-800">Katalog</h1>

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

    <!-- Tambah Data -->
    <div class="col-md-4 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    <i class="fa fa-plus"></i> Tambah Data
                </h6>
            </div>
            <form action="{{ url('/admin/master/katalog') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="id_katalog"> ID Katalog </label>
                        <input type="text" class="form-control" name="id_katalog" id="id_katalog" placeholder="Masukkan ID Katalog">
                    </div>
                    <div class="form-group">
                        <label for="nama_katalog"> Nama Katalog </label>
                        <input type="text" class="form-control" name="nama_katalog" id="nama_katalog" placeholder="Masukkan Nama Katalog">
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
                                <th class="text-center">ID Katalog</th>
                                <th>Nama</th>
                                <th class="text-center">Slug</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $no = 0
                            @endphp
                            @foreach ($katalogs as $item)
                            <tr>
                                <td class="text-center">{{ ++$no }}.</td>
                                <td class="text-center">{{ $item->id_katalog }}</td>
                                <td>{{ $item->nama_katalog }}</td>
                                <td class="text-center">{{ $item->slug }}</td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#exampleModalEdit-{{ $item->id_katalog }}">
                                        <i class="fa fa-edit"></i> Edit
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModalHapus-{{ $item->id_katalog }}">
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
@foreach ($katalogs as $item)
<div class="modal fade" id="exampleModalEdit-{{ $item->id_katalog }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            <form action="{{ url('/admin/master/katalog/'.$item->id_katalog) }}" method="POST">
                @method("PUT")
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="id_katalog"> ID Katalog </label>
                        <input type="text" class="form-control" name="id_katalog" id="id_katalog" placeholder="Masukkan ID Katalog" value="{{ $item->id_katalog }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="nama_katalog"> Nama Katalog </label>
                        <input type="text" class="form-control" name="nama_katalog" id="nama_katalog" placeholder="Masukkan Nama Katalog" value="{{ $item->nama_katalog }}">
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
@foreach ($katalogs as $item)
<div class="modal fade" id="exampleModalHapus-{{ $item->id_katalog }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            <form action="{{ url('/admin/master/katalog/'.$item->id_katalog) }}" method="POST">
                @method("DELETE")
                @csrf
                <div class="modal-body">
                    <p>
                        Apakah Anda Yakin Untuk Menghapus Data
                        <strong>{{ $item->nama_katalog }}</strong> ?
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
