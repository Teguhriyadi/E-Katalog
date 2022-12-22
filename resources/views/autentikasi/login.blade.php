
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Majestic Admin</title>
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
                            <h4>Hello! Selamat Datang</h4>
                            <h6 class="font-weight-light">
                                Silahkan Login Terlebih Dahulu
                            </h6>
                            <form class="pt-3" action="{{ url('/auth') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control form-control-lg" id="email" placeholder="Masukkan Email">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control form-control-lg" id="password" placeholder="Masukkan Password">
                                </div>
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-primary" style="width: 100%">
                                        Login
                                    </button>
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
