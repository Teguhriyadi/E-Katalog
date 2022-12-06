@extends("user.layout.main")

@section("title", "Login")

@section("content")

<div class="row m-0 pt-3">
    <div class="col-md-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <form method="POST" action="{{ url('/login') }}">
                        @csrf
                        <div class="card">
                            <div class="card-body">
                                <b>Login Pelanggan</b>
                                <hr>
                                <div class="mb-3 row">
                                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="email" class="form-control" id="email" placeholder="Masukkan Email" autocomplete="off">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="password" class="col-sm-2 col-form-label">Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password" autocomplete="off">
                                    </div>
                                </div>
                                <hr>
                                <button type="submit" class="btn btn-primary btn-sm" name="btn-login">
                                    <i class="fa fa-plane"></i> Login
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            Bergabung mejadi pelanggan kami
                        </div>
                        <div class="card-footer">
                            <a href="{{ url('/register') }}">
                                <i class="fa fa-plus"></i> Daftar
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>

@endsection
