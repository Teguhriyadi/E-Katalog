@extends('layouts.main')

@section("title_breadcrumb")

<h1 class="h3 mb-0 text-gray-800">Dashboard</h1>

@endsection

@section('content')

<div class="alert alert-success" role="alert">
    <h4 class="alert-heading">Selamat Datang
        <strong>
            {{ Auth::user()->nama }}
        </strong>
    </h4>
    <p>
        di <strong>Aplikasi Loveable.</strong>
    </p>
    <hr>
    <p class="mb-0">
        Silahkan Pilih Menu Untuk Memulai Program
    </p>
</div>

@endsection
