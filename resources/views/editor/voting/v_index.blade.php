@extends('layouts.main')

@section("title", "Voting")

@section("title_breadcrumb")

<h1 class="h3 mb-0 text-gray-800">
    @yield("title")
</h1>

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
                    Data @yield("title")
                </h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="text-center">No.</th>
                                <th class="text-center">Url Voting</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 0
                            @endphp
                            @foreach ($voting as $item)
                            <tr>
                                <td class="text-center">{{ ++$no }}.</td>
                                <td class="text-center">{{ $item->url_voting }}</td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#exampleModalEdit-{{ $item->id_voting_pembaca }}">
                                        <i class="fa fa-trash"></i> Edit
                                    </button>
                                    @if (empty($item->id_penulis))
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModalHapus-{{ $item->id_voting_pembaca }}">
                                        <i class="fa fa-trash"></i> Hapus
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
</div>

<!-- Modal Edit -->
@foreach ($voting as $item)
<div class="modal fade" id="exampleModalEdit-{{ $item->id_voting_pembaca }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            <form action="{{ url('/editor/voting/pembaca/'.$item->id_voting_pembaca) }}" method="POST">
                @method("PUT")
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="url_voting"> URL Voting </label>
                        <input type="url" class="form-control" name="url_voting" id="url_voting" placeholder="Masukkan Judul" value="{{ old("url_voting") ?? $item->url_voting }}">
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

<!-- Modal Edit -->
@foreach ($voting as $item)
<div class="modal fade" id="exampleModalHapus-{{ $item->id_voting_pembaca }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            <form action="{{ url('/editor/voting/pembaca/'.$item->id_voting_pembaca) }}" method="POST">
                @method("DELETE")
                @csrf
                <div class="modal-body">
                    <p>
                        Apakah Anda Yakin Untuk Menghapus Data Ini ?
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
