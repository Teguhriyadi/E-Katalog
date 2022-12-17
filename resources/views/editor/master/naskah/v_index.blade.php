@extends('layouts.main')

@section("title", "Data Naskah")

@section("title_breadcrumb")

<h1 class="h3 mb-0 text-gray-800">@yield("title")</h1>

@endsection

@section("component_css")

<link href="{{ url('/theme') }}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

@endsection

@section('content')

<div class="row">
    <!-- Tabel -->
    <div class="col-md-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    <i class="fa fa-book"></i> @yield("title")
                </h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="text-center">No.</th>
                                <th>Judul</th>
                                <th class="text-center">Kategori</th>
                                <th class="text-center">Penulis</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $no = 0
                            @endphp
                            @foreach ($naskah as $item)
                            <tr>
                                <td class="text-center">{{ ++$no }}.</td>
                                <td>{{ $item->judul_naskah }}</td>
                                <td class="text-center">
                                    @if ($item->kategori_naskah == 1)
                                    Fiksi
                                    @elseif($item->kategori_naskah == 2)
                                    Non - Fiksi
                                    @endif
                                </td>
                                <td class="text-center">{{ $item->penulis->users->nama }}</td>
                                <td class="text-center">
                                    @if ($item->status_naskah == 1)
                                    <span class="badge badge-success">
                                        Naskah Diterima
                                    </span>
                                    @elseif($item->status_naskah == 2)
                                    <span class="badge badge-danger">
                                        Naskah Ditolak
                                    </span>
                                    @elseif ($item->status_naskah == 0)
                                    <span class="badge badge-warning">
                                        Naskah Sedang Diproses
                                    </span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModalDetail-{{ $item->id_naskah }}">
                                        <i class="fa fa-search"></i> Detail
                                    </button>
                                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#exampleModalStatus-{{ $item->id_naskah }}">
                                        <i class="fa fa-edit"></i> Edit
                                    </button>
                                    <a href="{{ url('/editor/master/naskah/'.$item->id_naskah.'/download') }}" target="_blank" class="btn btn-danger btn-sm">
                                        <i class="fa fa-download"></i> Download PDF
                                    </a>
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

<!-- Detail Data -->
@foreach ($naskah as $item)
<div class="modal fade" id="exampleModalDetail-{{ $item->id_naskah }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    <i class="fa fa-search"></i> Detail Data
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <div class="mb-3 row">
                        <label class="col-md-3 form-label text-right">Judul:</label>
                        <div class="col-md-7">
                            {{ $item->judul_naskah }}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="mb-3 row">
                        <label class="col-md-3 form-label text-right">Deskripsi:</label>
                        <div class="col-md-7">
                            {{ $item->desc_naskah }}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="mb-3 row">
                        <label class="col-md-3 form-label text-right">Penulis:</label>
                        <div class="col-md-7">
                            {{ $item->penulis->users->nama }}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="mb-3 row">
                        <label class="col-md-3 form-label text-right">Kategori:</label>
                        <div class="col-md-7">
                            @if ($item->kategori_naskah == 1)
                            Fiksi
                            @elseif($item->kategori_naskah = 2)
                            Non - Fiksi
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="mb-3 row">
                        <label class="col-md-3 form-label text-right">Status:</label>
                        <div class="col-md-7">
                            @if ($item->status_naskah == 1)
                            <span class="badge badge-success">
                                Naskah Diterima
                            </span>
                            @elseif($item->status_naskah == 2)
                            <span class="badge badge-danger">
                                Naskah Ditolak
                            </span>
                            @elseif ($item->status_naskah == 0)
                            <span class="badge badge-warning">
                                Naskah Sedang Diproses
                            </span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
<!-- END -->

<!-- Ubah Status -->
@foreach ($naskah as $item)
<div class="modal fade" id="exampleModalStatus-{{ $item->id_naskah }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    <i class="fa fa-search"></i> Detail Data
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ url('/editor/master/naskah/'.$item->id_naskah) }}" method="POST">
                @method("PUT")
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="ubah_status"> Ubah Status </label>
                        <select name="ubah_status" class="form-control" id="ubah_status">
                            <option value="">- Pilih -</option>
                            <option value="1">Diterima</option>
                            <option value="2">Ditolak</option>
                        </select>
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

@endsection

@section("component_js")

<script src="{{ url('/theme') }}/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="{{ url('/theme') }}/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="{{ url('/theme') }}/js/demo/datatables-demo.js"></script>

@endsection
