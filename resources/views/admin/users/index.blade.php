@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">

        <!-- Menampilkan Pesan -->
        @if(session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
        @endif
        <!-- END -->

        <div class = "card">
            <div class = "card-header">
                <h3 style="display: inline;">
                    Data Users
                </h3>
                <a href="#" data-bs-toggle="modal" data-bs-target="#addModal" class="btn btn-primary btn-sm float-end">
                    Tambah User
                </a>
            </div>

            <div class="card-body">
                <table class = "table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">No.</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 0
                        @endphp
                        @forelse ($users as $user)
                            <tr>
                                <td class="text-center">{{ ++$no }}.</td>
                                <td>{{ $user->nama }}</td>
                                <td>{{ $user->email }}</td>
                                <td class="text-center">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#editModal-{{ $user->id_users }}" class="btn btn-success btn-sm">
                                        Ubah
                                    </a>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#hapusModal-{{ $user->id_users }}" class="btn btn-danger btn-sm">
                                        Hapus
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">
                                    <strong>
                                        <i>
                                            Data Tidak Ada
                                        </i>
                                    </strong>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Tambah Data -->
<div id="addModal" tabindex="-1" class="modal fade" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">
                    Tambah Data
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ url('/admin/users') }}" method="POST">
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
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary btn-sm">
                        Batalkan
                    </button>
                    <button type="submit" class="btn btn-primary btn-sm">
                        Tambah
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END -->

<!-- Edit Data -->
@foreach ($users as $item)
<div id="editModal-{{ $item->id_users }}" tabindex="-1" class="modal fade" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">
                    Edit Data
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ url('/admin/users/'.$item->id_users) }}" method="POST">
                @csrf
                @method("PUT")
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama"> Nama </label>
                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama" value="{{ $item->nama }}">
                    </div>
                    <div class="form-group">
                        <label for="email"> Email </label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Masukkan Email" value="{{ $item->email }}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary btn-sm">
                        Batalkan
                    </button>
                    <button type="submit" class="btn btn-success btn-sm">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
<!-- END -->

<!-- Hapus Data -->
@foreach ($users as $item)
<div id="hapusModal-{{ $item->id_users }}" tabindex="-1" class="modal fade" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">
                    Hapus Data
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ url('/admin/users/'.$item->id_users) }}" method="POST">
                @csrf
                @method("DELETE")
                <div class="modal-body">
                    <strong>
                        Apakah Yakin Untuk Menghapus Data Ini ?
                    </strong>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal" data-bs-target="#deleteModal">Batalkan</button>
                    <button type="submit" class="btn btn-success btn-sm">
                        Iyaa, Hapus
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
<!-- END -->

@endsection
