@extends('layouts.main')

<!-- page content -->
@section('page-content')
    <div class="page-content page-home">
      <!-- alert-->
      @if (session('status'))
        <div class="alert alert-success" role="alert">
          {{ session('status') }}
        </div>
      @endif
      <!-- carousel -->
      <section class="store-carousel">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div
                id="storeCarousel"
                class="carousel slide"
                data-bs-ride="carousel"
              >
                <ol class="carousel-indicators">
                  <li
                    class="active"
                    data-bs-target="#storeCarousel"
                    data-bs-slide-to="0"
                  ></li>
                  <li data-bs-target="#storeCarousel" data-bs-slide-to="1"></li>
                  <li data-bs-target="#storeCarousel" data-bs-slide-to="2"></li>
                </ol>

                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img
                      src="img/banner1.png"
                      alt="carousel image"
                      class="d-block w-100"
                    />
                  </div>
                  <div class="carousel-item">
                    <img
                      src="img/banner2.jpg"
                      alt="carousel image"
                      class="d-block w-100"
                    />
                  </div>
                  <div class="carousel-item">
                    <img
                      src="img/banner3.jpg"
                      alt="carousel image"
                      class="d-block w-100"
                    />
                  </div>

                  <!-- slide nav carousel-->
                    <button class="carousel-control-prev" type="button" data-bs-target="#storeCarousel" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#storeCarousel" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- kategori buku -->
      <section class ="store-categories">
        <div class = "container">
          <div class = "row">
            <div class = "col mt-4 mb-1">
              <h5> Kategori Buku </h5>
            </div>
          </div>

            <div class="row gx-5"> <!-- gx-5 -->
              <div class="col"> <!-- p3 border bg-light-->
                <div class="col"> <!-- p3 border bg-light-->
                  <div class = "box-categories">
                    <img class = "img-fluid" src = "img/kategori1.jpg" alt = "" />
                    <div class="d-flex justify-content-center align-items-center h-100">
                  </div>
                  </div>
                </div>
                 <p class="text-white mb-0">Pre-Order</p>
              </div>

                <div class="col"> <!-- p3 border bg-light-->
                  <div class = "box-categories">
                    <img class = "img-fluid" src = "img/kategori1.jpg" alt = "" />
                    <div class="d-flex justify-content-center align-items-center h-100">
                  </div>
                  </div>
                  <p class="text-white mb-0">Pre-Order</p>
                </div>
            </div>
          </div>
        </div>
      </section>

      <!-- artikel -->
      <section class = "store-article">
        <div class = "container">
          <div class = "row">
            <div class = "col mt-2 mb-1">
              <h5> Artikel Berita </h5>
            </div>
          </div>

          <div class = "row">
            <div class = "col-md-6 col-lg-4 col-xl-4">
              <div class = "box-article">
                <div class = "article-img">
                  <img class = "img-fluid" src="img/artikel2.jpg" alt = "" />
                </div>
                  <div class = "article-content">
                    <div class = "title-article">
                      <h3> Judul Artikel 1</h3>
                      <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Facilis error maiores, quia laboriosam quae culpa, animi, porro laudantium quidem placeat delectus voluptatem sapiente. Totam praesentium, laborum ullam consequuntur doloremque voluptates!</p>
                    </div>
                  </div>
              </div>
            </div>

            <div class = "col-md-6 col-lg-4 col-xl-4">
              <div class = "box-article">
                <div class = "article-img">
                  <img class = "img-fluid" src="img/artikel2.jpg" alt = "" />
                </div>
                  <div class = "article-content">
                    <div class = "title-article">
                      <h3> Judul Artikel 2</h3>
                      <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Facilis error maiores, quia laboriosam quae culpa, animi, porro laudantium quidem placeat delectus voluptatem sapiente. Totam praesentium, laborum ullam consequuntur doloremque voluptates!</p>
                    </div>
                  </div>
              </div>
            </div>

          </div>

        </div>
      </section>
    </div>
@endsection