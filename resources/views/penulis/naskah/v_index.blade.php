@php
use Carbon\Carbon;
@endphp

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
                                <th class="text-center">Judul Naskah</th>
                                <th class="text-center">Kategori Naskah</th>
                                <th class="text-center">Tanggal Upload</th>
                                <th class="text-center">Status Naskah</th>
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
                                <td class="text-center">{{ $item->judul_naskah }}</td>
                                <td class="text-center">
                                    @if ($item->kategori_naskah == "1")
                                    Fiksi
                                    @elseif ($item->kategori_naskah == "2")
                                    Non - Fiksi
                                    @endif
                                </td>
                                <td class="text-center">
                                    {{ Carbon::createFromFormat("Y-m-d", $item->tgl_upload)->isoFormat('D MMMM Y') }}
                                </td>
                                <td class="text-center">
                                    @if ($item->status_naskah == 1)
                                    <span class="badge badge-success">
                                        Naskah Diterima
                                    </span>
                                    @elseif($item->status_naskah == 0)
                                    <span class="badge badge-warning">
                                        Naskah Sedang Diproses
                                    </span>
                                    @elseif($item->status_naskah == 2)
                                    <span class="badge badge-danger">
                                        Naskah Ditolak
                                    </span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModalDetail-{{ $item->id_naskah }}">
                                        <i class="fa fa-search"></i> Detail
                                    </button>
                                    @if ($item->status_naskah == 1 && $item->status_naskah == 2)

                                    @elseif($item->status_naskah == 0)
                                    <a href="{{ url('/penulis/master/naskah/'.$item->id_naskah.'/edit') }}" class="btn btn-warning btn-sm">
                                        <i class="fa fa-edit"></i> Edit
                                    </a>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModalBatal-{{ $item->id_naskah }}">
                                        <i class="fa fa-times"></i> Batal
                                    </button>
                                    @endif
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
                        <label for="judul_naskah" class="form-label col-md-3 text-right"> Judul: </label>
                        <div class="col-md-7">
                            {{ $item->judul_naskah }}
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="tgl_upload" class="form-label col-md-3 text-right"> Upload Pada: </label>
                        <div class="col-md-7">
                            {{ Carbon::createFromFormat("Y-m-d", $item->tgl_upload)->isoFormat('D MMMM Y') }}
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="desc_naskah" class="form-label col-md-3 text-right"> Deskripsi: </label>
                        <div class="col-md-7">
                            {{ $item->desc_naskah }}
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="status_naskah" class="form-label col-md-3 text-right"> Status: </label>
                        <div class="col-md-7">
                            @if ($item->status_naskah == 1)
                            <span class="badge badge-success">
                                Naskah Diterima
                            </span>
                            @elseif($item->status_naskah == 0)
                            <span class="badge badge-warning">
                                Naskah Sedang Diproses
                            </span>
                            @elseif($item->status_naskah == 2)
                            <span class="badge badge-danger">
                                Naskah Ditolak
                            </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="form-group"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
<!-- END -->

<!-- Batal -->
@foreach ($naskah as $item)
<div class="modal fade" id="exampleModalBatal-{{ $item->id_naskah }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    <i class="fa fa-book"></i> Konfirmasi Data
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ url('/penulis/master/naskah/' . $item->id_naskah) }}" method="POST">
                @method("DELETE")
                @csrf
                <div class="modal-body">
                    <p>
                        Apakah Anda Yakin Untuk Membatalkan Data
                        <strong>
                            {{ $item->judul_naskah }} ?
                        </strong>
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="fa fa-check"></i> Iyaa
                    </button>
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
