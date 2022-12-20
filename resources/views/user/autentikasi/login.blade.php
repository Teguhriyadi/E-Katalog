@extends('user.main')

@section('title', 'Login')

@section('component_css')

<link href="{{ url('') }}/assets/css/login.css" rel="stylesheet" />

@endsection

@section('content')

<section class="background-radial-gradient overflow-hidden">
    <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
        <div class="row gx-lg-5 align-items-center mb-5">
            <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
                <h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
                    Loveable <br />
                    <span style="color: hsl(218, 81%, 75%)">
                        <i>
                            " Mencari Seputar Kisah Remaja "
                        </i>
                    </span>
                </h1>
                <p class="mb-4 opacity-70" style="color: hsl(218, 81%, 85%)">
                    Kamu bisa mencari kisah - kisah sesuai dengan mood atau suasana hati kamu di loveable. Tidak hanya itu, kamu bisa juga membeli referensi buku yang sudah tersedia
                </p>
                <a href="{{ url('/') }}" class="btn btn-block btn-primary">
                    Kembali Ke Halaman Awal
                </a>

            </div>

            <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
                <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
                <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>
                <div class="card bg-glass">
                    <div class="card-body px-4 py-5 px-md-5">
                        <h1 class="mb-2 text-center">
                            <span style="color: hsl(218, 81%, 75%)">Login Akun</span>
                        </h1>
                        <a href="{{ url('/daftar') }}" class="mb-0"
                        style="text-decoration: none; color: black; font-size: 14px">
                        <p>
                            Belum Punya Akun ?
                            <span class="text-primary">
                                Silahkan Buat Disini
                            </span>
                            </p>
                        </a>
                        <form method="POST" action="{{ url('/login') }}">
                            @csrf
                                <!-- Email input -->
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="email">Email</label>
                                    <input type="email" id="email" name="email" class="form-control" />
                                </div>

                                <!-- Password input -->
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="password">Password</label>
                                    <input type="password" name="password" id="password" class="form-control" />
                                </div>

                                <button type="submit" class="btn btn-primary btn-block w-100 mb-4">
                                    Login Sekarang
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @endsection
