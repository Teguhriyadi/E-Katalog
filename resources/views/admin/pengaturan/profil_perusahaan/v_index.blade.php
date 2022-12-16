@extends('layouts.main')

@section("title", "Profil Perusahaan")

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

    <!-- Tambah Data -->
    <div class="col-md-12 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    @if (empty($profil_perusahaan))
                    <i class="fa fa-plus"></i> Tambah Data
                    @else
                    <i class="fa fa-edit"></i> Edit Data
                    @endif
                </h6>
            </div>
            @if (empty($profil_perusahaan))
            <form action="{{ url('/admin/pengaturan/profil_perusahaan/') }}" method="POST" enctype="multipart/form-data">
            @else
            <form action="{{ url('/admin/pengaturan/profil_perusahaan/' . $profil_perusahaan->id_profil) }}" method="POST" enctype="multipart/form-data">
                @method("PUT")
            @endif
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="foto"> Gambar Perusahaan </label>
                                <input type="file" class="form-control" name="foto" id="foto">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="nama_perusahaan"> Nama Perusahaan </label>
                                <input type="text" class="form-control" name="nama_perusahaan" id="nama_perusahaan" placeholder="Masukkan Nama Perusahaan" value="{{ empty($profil_perusahaan) ? '' : $profil_perusahaan->nama_perusahaan }}">
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="email"> Email </label>
                                        <input type="email" class="form-control" name="email" id="email" placeholder="Masukkan Email" value="{{ empty($profil_perusahaan) ? '' : $profil_perusahaan->email }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="nomor_hp"> Nomor HP </label>
                                        <input type="text" class="form-control" name="nomor_hp" id="nomor_hp" placeholder="0" value="{{ empty($profil_perusahaan) ? '' : $profil_perusahaan->nomor_hp }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="deskripsi_singkat"> Deskripsi Singkat </label>
                                        <input type="text" class="form-control" name="deskripsi_singkat" id="deskripsi_singkat" placeholder="Masukkan Deskripsi Singkat" value="{{ empty($profil_perusahaan) ? '' : $profil_perusahaan->deskripsi_singkat }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="alamat"> Alamat </label>
                                        <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Masukkan Alamat" value="{{ empty($profil_perusahaan) ? '' : $profil_perusahaan->alamat }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nama_perusahaan"> Deskripsi </label>
                                <textarea name="deskripsi" class="form-control" name="deskripsi" id="deskripsi" rows="5" placeholder="Masukkan Deskripsi">{{ empty($profil_perusahaan) ? '' : $profil_perusahaan->deskripsi }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    @if (empty($profil_perusahaan))
                        @include("admin.components.btn-tambah")
                    @else
                        @include("admin.components.btn-edit")
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
