@php
use App\Models\User;
@endphp

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
                {{-- <li class="dropdown">
                    <a href="#"><span>Price List</span>
                        <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                        <ul>
                            <li><a href="jasa-fotografi.html">Price List Jasa Fotografi</a></li>
                            <li><a href="jasa-videografi.html">Price List Jasa Videografi</a></li>
                            <li><a href="jasa.html">Price List Jasa Dokumentasi</a></li>
                        </ul>
                    </li> --}}

                    {{-- <li>
                        <a href="{{ url('/voting/pilihan') }}">
                            Voting Pembaca
                        </a>
                    </li> --}}

                    @if (empty(Auth::user()->role))
                    @php
                    if (empty(Auth::user()->role)) {
                        $id_users = 0;
                    } else {
                        $id_users = Auth::user()->id_users;
                    }
                    $user = User::where("id_users", $id_users)->first();
                    @endphp

                    @if (empty($user))
                    <li>
                        <a href="{{ url('/login') }}" class="{{ Request::segment(1) == "login" ? 'active' : '' }}">Login</a>
                    </li>
                    <li>
                        <a href="{{ url('/daftar') }}" class="{{ Request::segment(1) == "daftar" ? 'active' : '' }}">Daftar</a>
                    </li>
                    @endif
                    @else
                    <li>
                        <a href="{{ url('/riwayat_belanja') }}">
                            Riwayat Belanja
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/keranjang') }}">
                            <i class="fas fa-cart-flatbed me-1"></i>
                            Keranjang
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/checkout') }}">
                            Checkout
                        </a>
                    </li>
                    <li class="dropdown">
                        <a href="#">
                            <span>Akun</span>
                            <i class="bi bi-chevron-down dropdown-indicator"></i>
                        </a>
                        <ul>
                            {{-- <li><a href="profil.html">Profile</a></li> --}}
                            <li>
                                <a href="{{ url('/logout-user') }}">Log Out</a>
                            </li>
                        </ul>
                    </li>
                    @endif

                    @if (empty(Auth::user()->role))
                    <li>
                        <a href="{{ url('/auth/penulis/login') }}">Login Penulis</a>
                    </li>
                    @elseif(Auth::user()->role == "penulis")
                    <li>
                        <a href="{{ url('/penulis/dashboard') }}">Dashboard Penulis</a>
                    </li>
                    @else
                    <li>
                        <a href="{{ url('/auth/penulis/login') }}">Login Penulis</a>
                    </li>
                    @endif
                </ul>
            </nav>
            <!-- .navbar -->
        </div>
    </header>
