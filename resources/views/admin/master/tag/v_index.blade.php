@extends('layouts.admin')

@section("component_css")

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css">

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
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">
                    Tambah Data
                </h4>
                <form class="form-sample" action="{{ url('/admin/master/tag') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nama"> Nama </label>
                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama Tag">
                    </div>
                    <button type="reset" class="btn btn-inverse-danger btn-sm">
                        Kembali
                    </button>
                    <button type="submit" class="btn btn-inverse-primary btn-sm">
                        Tambah
                    </button>
                </form>
            </div>
        </div>
    </div>
    <!-- END Form Tambah Data -->

    <!-- Tabel -->
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">
                    Tags
                </h4>
                <table id="myTable" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th class="text-center">No.</th>
                            <th class="text-center">Tag</th>
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
                                <button type="button" class="btn btn-inverse-warning btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModalEdit-{{ $item->id }}" style="padding: 10px 15px;">
                                    Edit
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- END Tabel -->
</div>

<!-- Modal -->
@foreach ($tags as $item)
<div class="modal fade" id="exampleModalEdit-{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal fade">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
@endforeach
<!-- END -->

@endsection

@section("component_js")

<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap4.min.js"></script>

<script type="text/javascript">
    $(document).ready( function () {
        $('#myTable').DataTable();
    } );
</script>

@endsection
