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

@endsection

@section("component_js")

<script src="{{ url('/theme') }}/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="{{ url('/theme') }}/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="{{ url('/theme') }}/js/demo/datatables-demo.js"></script>

@endsection
