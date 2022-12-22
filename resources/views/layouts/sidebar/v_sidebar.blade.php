<ul class="navbar-nav bg-gradient-warning sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <img src="{{ url('/img/logo_loveable_new.png') }}" class="img-fluid">
        </div>
        <div class="sidebar-brand-text mx-3">
            Loveable
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Request::segment(2) == "dashboard" ? 'active' : '' }} ">
        @if (Auth::user()->role == "admin")
        <a class="nav-link" href="{{ url('/admin/dashboard') }}">
            @elseif(Auth::user()->role == "editor")
            <a class="nav-link" href="{{ url('/editor/dashboard') }}">
                @elseif(Auth::user()->role == "penulis")
                <a class="nav-link" href="{{ url('/penulis/dashboard') }}">
                    @endif
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Menu
            </div>

            @can("admin")
            <li class="nav-item {{ Request::segment(2) == "master" ? "active" : "" }} ">
                <a class="nav-link {{ Request::segment(2) == "master" ? "" : "collapsed" }}" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-bars"></i>
                    <span>Master</span>
                </a>
                <div id="collapseTwo" class="collapse {{ Request::segment(2) == "master" ? "show" : "" }} " aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item {{ Request::segment(3) == "tag" ? "active" : "" }}" href="{{ url('/admin/master/tag') }}">
                            Tags
                        </a>
                        <a class="collapse-item {{ Request::segment(3) == "katalog" ? "active" : "" }}" href="{{ url('/admin/master/katalog') }}">
                            Katalog
                        </a>
                        <a class="collapse-item {{ Request::segment(3) == "buku" ? "active" : "" }}" href="{{ url('/admin/master/buku') }}">
                            Buku
                        </a>
                        <a class="collapse-item {{ Request::segment(3) == "paket" ? "active" : "" }} " href="{{ url('/admin/master/paket') }}">
                            Paket
                        </a>
                    </div>
                </div>
            </li>

            <li class="nav-item {{ Request::segment(2) == "web" ? "active" : "" }}">
                <a class="nav-link {{ Request::segment(2) == "web" ? "" : "collapsed" }}" href="#" data-toggle="collapse" data-target="#collapseWeb" aria-expanded="true" aria-controls="collapseWeb">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Web</span>
                </a>
                <div id="collapseWeb" class="collapse {{ Request::segment(2) == "web" ? "show" : "" }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item {{ Request::segment(3) == "carousel" ? "active" : "" }}" href="{{ url('/admin/web/carousel') }}">
                            Carousel
                        </a>
                        <a class="collapse-item {{ Request::segment(3) == "artikel" ? "active" : "" }}" href="{{ url('/admin/web/artikel') }}">
                            Artikel
                        </a>
                        <a class="collapse-item {{ Request::segment(3) == "pesan" ? "active" : "" }}" href="{{ url('/admin/web/pesan') }}">
                            Pesan
                        </a>
                    </div>
                </div>
            </li>

            <li class="nav-item {{ Request::segment(2) == "pengaturan" ? "active" : "" }}">
                <a class="nav-link {{ Request::segment(2) == "pengaturan" ? "" : "collapsed" }}" href="#" data-toggle="collapse" data-target="#collapsePengaturan" aria-expanded="true" aria-controls="collapsePengaturan">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Pengaturan</span>
                </a>
                <div id="collapsePengaturan" class="collapse {{ Request::segment(2) == "pengaturan" ? "show" : "" }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item {{ Request::segment(3) == "profil_perusahaan" ? "active" : "" }}" href="{{ url('/admin/pengaturan/profil_perusahaan') }}">
                            Profil Perusahaan
                        </a>
                        <a class="collapse-item {{ Request::segment(3) == "syarat_ketentuan" ? "active" : "" }}" href="{{ url('/admin/pengaturan/syarat_ketentuan') }}">
                            Syarat Ketentuan
                        </a>
                    </div>
                </div>
            </li>
            @endcan

            @can("editor")
            <li class="nav-item {{ Request::segment("3") == "naskah" ? "active" : "" }} ">
                <a href="{{ url('/editor/master/naskah') }}" class="nav-link">
                    <i class="fa fa-book"></i> Naskah Penulis
                </a>
            </li>
            <li class="nav-item {{ Request::segment(2) == "voting" ? "active" : "" }} ">
                <a class="nav-link {{ Request::segment(2) == "voting" ? "" : "collapsed" }}" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-edit"></i>
                    <span>Voting Pembaca</span>
                </a>
                <div id="collapseTwo" class="collapse {{ Request::segment(2) == "voting" ? "show" : "" }} " aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item {{ Request::is("editor/voting/pembaca") ? "active" : "" }} " href="{{ url('/editor/voting/pembaca') }}">
                            Data Voting
                        </a>
                        <a class="collapse-item {{ Request::is("editor/voting/pembaca/create") ? "active" : "" }} " href="{{ url('/editor/voting/pembaca/create') }}">
                            Tambah Data Voting
                        </a>
                    </div>
                </div>
            </li>
            @endcan

            @can("penulis")
            <li class="nav-item {{ Request::is("penulis/master/naskah") ? 'active' : '' }}">
                <a href="{{ url('/penulis/master/naskah') }}" class="nav-link">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Data Naskah</span>
                </a>
            </li>
            <li class="nav-item {{ Request::is("penulis/master/naskah/create") ? 'active' : '' }} ">
                <a href="{{ url('/penulis/master/naskah/create') }}" class="nav-link">
                    <i class="fas fa-fw fa-upload"></i>
                    <span>Upload Naskah</span>
                </a>
            </li>
            <li class="nav-item {{ Request::is("penulis/master/naskah/create") ? 'active' : '' }} ">
                <a href="{{ url('/penulis/master/naskah/create') }}" class="nav-link">
                    <i class="fas fa-fw fa-upload"></i>
                    <span>Voting Penulis</span>
                </a>
            </li>
            @endcan

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Akun
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item {{ Request::segment(2) == "users" ? "active" : "" }}">
                <a class="nav-link {{ Request::segment(2) == "users" ? "" : "collapsed" }}" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
                aria-controls="collapsePages">
                <i class="fas fa-fw fa-users"></i>
                <span>Users</span>
            </a>
            <div id="collapsePages" class="collapse {{ Request::segment(2) == "users" ? "show" : "" }}" aria-labelledby="headingPages"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                @can("admin")
                <a class="collapse-item {{ Request::segment(3) == "editor" ? "active" : "" }}" href="{{ url('/admin/users/editor') }}">
                    Editor
                </a>
                <a class="collapse-item {{ Request::segment(3) == "penulis" ? "active" : "" }}" href="{{ url('/admin/users/penulis') }}">
                    Penulis
                </a>
                <a class="collapse-item {{ Request::segment(3) == "administrator" ? "active" : "" }}" href="{{ url('/admin/users/administrator') }}">
                    Administrator
                </a>
                @endcan

                @if (Auth::user()->role == "admin")
                <a class="collapse-item {{ Request::segment(3) == "update_profil" ? "active" : "" }}" href="{{ url('/admin/users/update_profil') }}">Profil Saya</a>
                @elseif(Auth::user()->role == "editor")
                <a class="collapse-item {{ Request::segment(3) == "update_profil" ? "active" : "" }}" href="{{ url('/editor/users/update_profil') }}">Profil Saya</a>
                @elseif(Auth::user()->role == "penulis")
                <a class="collapse-item {{ Request::segment(3) == "update_profil" ? "active" : "" }}" href="{{ url('/penulis/users/update_profil') }}">Profil Saya</a>
                @endif
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
