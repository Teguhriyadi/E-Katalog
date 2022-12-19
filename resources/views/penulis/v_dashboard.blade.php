@extends('layouts.main')

@section("title", "Dashboard")

@section("title_breadcrumb")

<h1 class="h3 mb-0 text-gray-800">Dashboard</h1>

@endsection

@section('content')

<div class="alert alert-warning" role="alert">
    <h4 class="alert-heading">Selamat Datang
        <strong>
            {{ Auth::user()->nama }}
        </strong>
    </h4>
    <p>
        di <strong>Aplikasi Loveable.</strong> Anda Login Sebagai
        <strong>
            {{ Auth::user()->role }}
        </strong>
    </p>
    <hr>
    <p class="mb-0">
        Silahkan Pilih Menu Untuk Memulai Program
    </p>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-12 mb-4">
                <a href="#">
                    <div class="card border-left-danger shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                        Naskah Yang Sedang Diproses
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        {{ $count_pending }}
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-users fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mb-4">
                <a href="#">
                    <div class="card border-left-danger shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                        Naskah Yang Sudah Diterima
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        {{ $count_terima }}
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-users fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mb-4">
                <a href="#">
                    <div class="card border-left-danger shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                        Naskah Yang Ditolak
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        {{ $count_tolak }}
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-users fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    <i class="fa fa-book"></i> Syarat & Ketentuan
                </h6>
            </div>
            <div class="card-body">
                @if (empty($syarat_ketentuan))
                    <div class="alert alert-danger">
                        <strong>
                            Data Tidak Ada
                        </strong>
                    </div>
                @else
                {!! $syarat_ketentuan->keterangan !!}
                @endif
            </div>
        </div>
    </div>
</div>

@endsection
