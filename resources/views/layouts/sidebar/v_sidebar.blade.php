<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">
            Loveable
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/admin/dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Menu
        </div>

        @can("admin")
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-bars"></i>
                <span>Master</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ url('/admin/master/tag') }}">
                        Tags
                    </a>
                    <a class="collapse-item" href="{{ url('/admin/master/katalog') }}">
                        Katalog
                    </a>
                    <a class="collapse-item" href="{{ url('/admin/master/buku') }}">
                        Buku
                    </a>
                </div>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseWeb" aria-expanded="true" aria-controls="collapseWeb">
                <i class="fas fa-fw fa-book"></i>
                <span>Web</span>
            </a>
            <div id="collapseWeb" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ url('/admin/web/carousel') }}">
                        Carousel
                    </a>
                    <a class="collapse-item" href="{{ url('/admin/master/katalog') }}">
                        Katalog
                    </a>
                    <a class="collapse-item" href="{{ url('/admin/master/buku') }}">
                        Buku
                    </a>
                </div>
            </div>
        </li>
        @endcan

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Addons
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item active">
            <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
            aria-controls="collapsePages">
            <i class="fas fa-fw fa-users"></i>
            <span>Users</span>
        </a>
        <div id="collapsePages" class="collapse show" aria-labelledby="headingPages"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{ url('/admin/users/editor') }}">
                Editor
            </a>
            <a class="collapse-item" href="{{ url('/admin/users/penulis') }}">
                Penulis
            </a>
            <a class="collapse-item" href="{{ url('/admin/users/administrator') }}">
                Administrator
            </a>
            <a class="collapse-item active" href="blank.html">Profil Saya</a>
        </div>
    </div>
</li>

<!-- Nav Item - Tables -->
<li class="nav-item">
    <a class="nav-link" href="tables.html">
        <i class="fas fa-fw fa-table"></i>
        <span>Tables</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
