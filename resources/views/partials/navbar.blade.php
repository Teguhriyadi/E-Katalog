 <!-- h navbar-->
    <section class="h-100 w-100" style="box-sizing: border-box; background-color: #000000">
   
        <div class="container-xxl mx-auto p-0 position-relative header-2-4" style="font-family: 'Poppins', sans-serif">
          <nav class="navbar navbar-expand-lg navbar-dark">
            <a href="/">
              <!--<h2>logo</h2> -->
              <img style="width:180px; height:180px; margin-right: 0.75rem"
                src="img/logo_loveable_new.png" alt="" />
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="modal" data-bs-target="#targetModal-item">
              <span class="navbar-toggler-icon"></span>
            </button>


            <!-- navbar responsive ver -->
            <div class="modal-item modal fade" id="targetModal-item" tabindex="-1" role="dialog"
              aria-labelledby="targetModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content border-0" style="background-color: #000000">
                  <div class="modal-header border-0" style="padding: 2rem; padding-bottom: 0">
                    <a class="modal-title" id="targetModalLabel">
                      <img style="width:60px; height:60px; margin-right: 0.75rem"
                src="img/logo_loveable_new.png" alt="" />
                    </a>
                    <button type="button" class="close btn-close text-white" data-bs-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body" style="padding: 2rem; padding-top: 0; padding-bottom: 0">
                    <ul class="navbar-nav responsive me-auto mt-2 mt-lg-0">
                      <li class="nav-item">
                        <a class="nav-link {{ ($title == "Beranda") ? 'active' : '' }}" href="/" style="color: #e7e7e8">Beranda</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link {{ ($title == "Katalog") ? 'active' : '' }}" href="/katalog">Katalog</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link {{ ($title == "Reader's Pick") ? 'active' : '' }}" href="">Reader's Pick</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link {{ ($title == "Beranda") ? 'active' : '' }}" href="#">Pesanan</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link {{ ($title == "Beranda") ? 'active' : '' }}" href="#">Hubungi Kami</a>
                      </li>
                    </ul>
                  </div>
                  <div class="modal-footer border-0 gap-3" style="padding: 2rem; padding-top: 0.75rem">
                    <button class="btn btn-default btn-no-fill">Xx</button>
                    <button class="btn btn-fill border-0" href = "{{ route('login') }}">{{ __('Login') }}</button>
                  </div>
                </div>
              </div>
            </div>

            <!-- navbar full screen -->

            <div class="collapse navbar-collapse" id="navbarTogglerDemo">

              <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                <li class="nav-item">
                  <a class="nav-link {{ ($title == "Beranda") ? 'active' : '' }}" href="/" style="color: #e7e7e8">Beranda</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link {{ ($title == "Katalog") ? 'active' : '' }}" href="/katalog">Katalog</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link {{ ($title == "Reader's Pick") ? 'active' : '' }}" href="#">Reader's Pick</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link {{ ($title == "Pesanan") ? 'active' : '' }}" href="#">Pesanan</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link {{ ($title == "Hubungi Kami") ? 'active' : '' }}" href="#">Hubungi Kami</a>
                </li>
              </ul>
              <div class="gap-3">
                <button class="btn btn-default btn-no-fill" href = "/katalog">Xx</button>
                @if (Route::has('login'))
                <a href="{{ route('login') }}" button class="btn btn-fill border-0" >{{ __('Login') }} </a>
                @endif
              </div>
            </div>
          </nav>

          <!--buat search
          <div class = "container-fluid">
            <nav class="navbar navbar-light">  
              <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                  <button class="btn btn-outline-success" type="submit">Search</button>
              </form>
            </nav>
          </div> -->

        </div>
    </section>