
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Majestic Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ url('/admin') }}/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="{{ url('/admin') }}/vendors/base/vendor.bundle.base.css">
    <link rel="stylesheet" href="{{ url('/admin') }}/css/style.css">
    <link rel="shortcut icon" href="{{ url('/admin') }}/images/favicon.png" />
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <div class="brand-logo">
                                <img src="{{ url('/admin') }}/images/logo.svg" alt="logo">
                            </div>
                            <h4>Belum Punya Akun?</h4>
                            <h6 class="font-weight-light">
                                Daftar Dulu Yaa Disini
                            </h6>
                            <form class="pt-3" method="POST" action="{{ url('/auth/register') }}">
                                @csrf
                                <div class="form-group">
                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Lengkap">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email">
                                </div>
                                <div class="form-group">
                                    <input type="number" id="nomer_telepon" name="nomer_telepon" class="form-control" placeholder="Masukkan Nomer Telepon" min="1">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Konfirmasi Password">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat">
                                </div>
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-primary" style="width: 100%;">
                                        SignUp
                                    </button>
                                </div>
                                <div class="text-center mt-4 font-weight-light">
                                    Sudah Punya Akun?
                                    <a href="{{ url('/auth') }}" class="text-primary">
                                        Silahkan Login
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ url('/admin') }}/vendors/base/vendor.bundle.base.js"></script>
    <script src="{{ url('/admin') }}/js/off-canvas.js"></script>
    <script src="{{ url('/admin') }}/js/hoverable-collapse.js"></script>
    <script src="{{ url('/admin') }}/js/template.js"></script>
</body>

</html>
