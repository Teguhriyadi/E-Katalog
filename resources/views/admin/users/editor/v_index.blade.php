@extends('layouts.main')

@section("title", "Users Editor")

@section("title_breadcrumb")

<h1 class="h3 mb-0 text-gray-800">Users Editor</h1>

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
                    Data @yield("title")
                </h6>
                <div style="display: inline; float: right;">
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModalTambah">
                        <i class="fa fa-plus"></i> Tambah
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="text-center">No.</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 0
                            @endphp
                            @foreach ($users as $item)
                                <tr>
                                    <td class="text-center">{{ ++$no }}.</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td class="text-center">
                                        @if ($item->status == 1)
                                            <span class="badge badge-success">
                                                Aktif
                                            </span>
                                        @elseif($item->status == 0)
                                            <span class="badge badge-danger">
                                                Tidak Aktif
                                            </span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#exampleModalEdit-{{ $item->id_users }}">
                                            <i class="fa fa-edit"></i> Edit
                                        </button>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModalHapus-{{ $item->id_users }}">
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
</div>

<!-- Tambah Data -->
<div class="modal fade" id="exampleModalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    <i class="fa fa-plus"></i> Tambah Data
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ url('/admin/users/editor') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama"> Nama </label>
                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama">
                    </div>
                    <div class="form-group">
                        <label for="email"> Email </label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Masukkan Email">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nomer_telepon"> No. Telepon </label>
                                <input type="text" class="form-control" name="nomer_telepon" id="nomer_telepon" placeholder="Masukkan No. Telepon">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="gender"> Jenis Kelamin </label>
                                <select name="gender" class="form-control" id="gender">
                                    <option value="">- Pilih -</option>
                                    <option value="L">Laki - Laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="alamat"> Alamat </label>
                        <textarea name="alamat" class="form-control" id="alamat" rows="5" placeholder="Masukkan Alamat"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    @include("admin.components.btn-tambah")
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END -->

<!-- Edit Data -->
@foreach ($users as $item)
<div class="modal fade" id="exampleModalEdit-{{ $item->id_users }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            <form action="{{ url('/admin/users/editor/'.$item->id_users) }}" method="POST">
                @method("PUT")
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama"> Nama </label>
                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama" value="{{ $item->nama }}">
                    </div>
                    <div class="form-group">
                        <label for="email"> Email </label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Masukkan Email" value="{{ $item->email }}">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nomer_telepon"> No. Telepon </label>
                                <input type="text" class="form-control" name="nomer_telepon" id="nomer_telepon" placeholder="Masukkan No. Telepon" value="{{ $item->editor->nomer_telepon }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="gender"> Jenis Kelamin </label>
                                <select name="gender" class="form-control" id="gender">
                                    <option value="">- Pilih -</option>
                                    <option value="L" {{ $item->editor->gender == "L" ? "selected" : "" }}>Laki - Laki</option>
                                    <option value="P" {{ $item->editor->gender == "P" ? "selected" : "" }}>Perempuan</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="alamat"> Alamat </label>
                        <textarea name="alamat" class="form-control" id="alamat" rows="5" placeholder="Masukkan Alamat">{{ $item->editor->alamat }}</textarea>
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

<!-- Hapus Data -->
@foreach ($users as $item)
<div class="modal fade" id="exampleModalHapus-{{ $item->id_users }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            <form action="{{ url('/admin/users/editor/'.$item->id_users) }}" method="POST">
                @method("DELETE")
                @csrf
                <div class="modal-body">
                    <p>
                        Apakah Anda Yakin Ingin Menghapus Data
                        <strong>
                            {{ $item->nama }} ?
                        </strong>
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
