<header class="header clearfix bg-dark">
    <div class="top-bar d-none d-sm-block">
        <div class="container">
            <div class="row">
                <div class="col-6 text-left">
                    <ul class="top-links contact-info">
                        <li>
                            <i class="fa fa-envelope-o"></i>
                            <a href="#" class="text-white">
                                loveable.redaksi@gmail.com
                            </a>
                        </li>
                        <li>
                            <i class="fa fa-whatsapp"></i>
                            <span class="text-white">
                                0812-1470-7143
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="header-main border-top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3 col-12 col-sm-6">
                    <a class="navbar-brand mr-lg-5" href="{{ url('/') }}">
                        <img src="{{ url('/img/logo_loveable_new.png') }}" style = "width:100px; height:100px;" />
                        <span class="logo">
                            <!--Loveable-->
                        </span>
                    </a>
                </div>
                <div class="col-lg-7 col-12 col-sm-6">
                    <form action="#" class="search">
                        <div class="input-group w-100">
                            <input type="text" class="form-control" placeholder="Pencarian">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="Cari">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-2 col-12 col-sm-6">
                    <div class="right-icons pull-right d-none d-lg-block">
                        <div class="single-icon wishlist">
                            <a href="#"><i class="fa fa-heart-o fa-2x"></i></a>
                            <span class="badge badge-default">5</span>
                        </div>
                        <div class="single-icon shopping-cart">
                            <a href="#"><i class="fa fa-shopping-cart fa-2x"></i></a>
                            <span class="badge badge-default">4</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-main navbar-expand-lg navbar-light border-top border-bottom">
        <div class="container">

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav"
                aria-controls="main_nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="main_nav">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link text-white" href="{{ url('/') }}">Beranda</a>
                    </li>
                    @if (empty(Auth::user()->role))
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ url('/login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ url('/register') }}">Buat Akun</a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a href="{{ url('/keranjang') }}" class="nav-link text-white"> Keranjang </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/checkout') }}" class="nav-link text-white"> Pesan </a> <!--checkout-->
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</header>
