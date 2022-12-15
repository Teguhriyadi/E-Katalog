<header id="header" class="header d-flex align-items-center">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
        <a href="index.html" class="logo d-flex align-items-center">
            <h1>
                Loveable
                <span></span>
            </h1>
        </a>

        <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
        <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
        <nav id="navbar" class="navbar">
            <ul>
                <li>
                    <a href="{{ url('/') }}" class="{{ Request::segment(1) == "" ? 'active' : '' }}">Home</a>
                </li>
                <li class="dropdown">
                    <a href="#"><span>Price List</span>
                        <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                    <ul>
                        <li><a href="jasa-fotografi.html">Price List Jasa Fotografi</a></li>
                        <li><a href="jasa-videografi.html">Price List Jasa Videografi</a></li>
                        <li><a href="jasa.html">Price List Jasa Dokumentasi</a></li>
                    </ul>
                </li>
                <li><a href="timeline.html">Booking Online</a></li>
                <li><a href="#main">About Us</a></li>

                <li>
                    <a href="{{ url('/login') }}" class="{{ Request::segment(1) == "login" ? 'active' : '' }}">Login</a>
                </li>
                <li>
                    <a href="{{ url('/daftar') }}" class="{{ Request::segment(1) == "daftar" ? 'active' : '' }}">Daftar</a>
                </li>
                <li class="dropdown">
                    <a href="#"><span>Akun</span>
                        <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                    <ul>
                        <li><a href="profil.html">Profile</a></li>
                        <li><a href="jasa-videografi.html">Log Out</a></li>
                    </ul>
                </li>
                <li>
                    <span
                        class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">1</span>
                    <a href="register.html">
                        <i class="fas fa-cart-flatbed me-1"></i>
                        cart</a>
                </li>
            </ul>
        </nav>
        <!-- .navbar -->
    </div>
</header>
