@extends('layouts.main')

@section("title", "Update Profil")

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
                <h6 class="m-0 font-weight-bold text-primary" style="display: inline;">
                    Data @yield("title")
                </h6>
                <div style="display: inline; float: right;">
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModalGantiPassword-{{ Auth::user()->id_users }}">
                        <i class="fa fa-key"></i> Ganti Password
                    </button>
                </div>
            </div>
            <form action="{{ url('/admin/users/update_profil/'.Auth::user()->id_users) }}" method="POST">
                @method("PUT")
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <div class="mb-3 row">
                            <label for="nama" class="form-label col-md-3 text-right"> Nama :  </label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama" value="{{ Auth::user()->nama }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="mb-3 row">
                            <label for="email" class="form-label col-md-3 text-right"> Email :  </label>
                            <div class="col-md-7">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Masukkan Email" value="{{ Auth::user()->email }}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    @include("admin.components.btn-edit")
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Ganti Password -->
<div class="modal fade" id="exampleModalGantiPassword-{{ Auth::user()->id_users }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    <i class="fa fa-edit"></i> Edit Password
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ url('/admin/users/ubah_password/') }}" method="POST">
                @method("PUT")
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="password_lama" class="form-label"> Password Lama </label>
                        <input type="password" class="form-control" name="password_lama" id="password_lama" placeholder="Masukkan Password Lama">
                    </div>
                    <div class="form-group">
                        <label for="password_baru" class="form-label"> Password Baru </label>
                        <input type="password" class="form-control" name="password_baru" id="password_baru" placeholder="Masukkan Password Baru">
                    </div>
                    <div class="form-group">
                        <label for="konfirmasi_password" class="form-label"> Konfirmasi Password </label>
                        <input type="password" class="form-control" name="konfirmasi_password" id="konfirmasi_password" placeholder="Masukkan Konfirmasi Password">
                    </div>
                </div>
                <div class="modal-footer">
                    @include("admin.components.btn-edit")
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END -->

@endsection
