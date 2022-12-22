@extends('user.main')

@section('title', 'Daftar Akun')

@section('component_css')

<link href="{{ url('') }}/assets/css/login.css" rel="stylesheet" />

@endsection

@section('content')

<section class="background-radial-gradient overflow-hidden">
    <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
        <div class="row gx-lg-5 align-items-center mb-5">
            <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">

                <h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
                    Loveable Publishing <br />
                    <span style="color: hsl(218, 81%, 75%)">
                        <i>
                            " Tempat Mencari Referensi Buku "
                        </i>
                    </span>
                </h1>
                <p class="mb-4 opacity-70" style="color: hsl(218, 81%, 85%)">
                    Kami Memudahkan Para Pembaca / Pengunjung Dalam Mencari Buku Yang Diingkan. Dengan Adanya Loveable Ini Minat Baca Pada Masyarakat Akan Meningkat
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
                            <span style="color: hsl(218, 81%, 75%)">
                                Daftar Akun
                            </span>
                        </h1>
                        <a href="{{ url('/login') }}" class="mt-4"
                        style="text-decoration: none; color: black; font-size: 14px">
                        <p>
                            Sudah Punya Akun?
                            <span class="text-primary">
                                Login Disini
                            </span>
                            </p>
                        </a>
                        <form action="{{ url('/daftar') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <label class="form-label" for="nama_depan">
                                            Nama Depan
                                        </label>
                                        <input type="text" name="nama_depan" id="nama_depan" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <label class="form-label" for="nama_belakang">
                                            Nama Belakang
                                        </label>
                                        <input type="text" name="nama_belakang" id="nama_belakang" class="form-control" />
                                    </div>
                                </div>
                            </div>

                            <!-- Email input -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="email">
                                    Email
                                </label>
                                <input type="email" id="email" name="email" class="form-control" />
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="notelp">
                                            Nomer Telepon
                                        </label>
                                        <input type="text" id="notelp" name="notelp" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="gender">
                                            Jenis Kelamin
                                        </label>
                                        <select name="gender" class="form-control" id="gender">
                                            <option value="">- Piih -</option>
                                            <option value="L">Laki - Laki</option>
                                            <option value="P">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Password input -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="password">Password</label>
                                <input type="password" id="password" name="password" class="form-control" />
                            </div>

                            <div class="form-outline mb-4">
                                <label class="form-label" for="alamat"> Alamat </label>
                                <textarea name="alamat" class="form-control" id="alamat"  rows="5"></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary btn-block w-100 mb-4">
                                Daftar Sekarang
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
