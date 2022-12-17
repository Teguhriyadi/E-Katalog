@extends('layouts.main')

@section("title", "Dashboard")

@section("title_breadcrumb")

<h1 class="h3 mb-0 text-gray-800">
    @yield("title")
</h1>

@endsection

@section('content')

<div class="alert alert-warning" role="alert">
    <h4 class="alert-heading">Selamat Datang
        <strong>
            {{ Auth::user()->nama }}
        </strong>

    </h4>
    <p>
        di <strong>Aplikasi Loveable.</strong>
        Anda Login Sebagai
        <strong>
            {{ Auth::user()->role }}
        </strong>
    </p>
    <hr>
    <p class="mb-0">
        Silahkan Pilih Menu Untuk Memulai Program
    </p>
</div>

@endsection
