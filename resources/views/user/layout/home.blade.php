@php
use App\Models\GambarPaket;
@endphp

@extends("user.layout.main")

@section("title", "Dashboard")

@section("content")

<section class="slider-section pt-4 pb-4">
    <div class="container">
        <div class="slider-inner">
            <div class="row">
                <div class="col-md-3">
                    <nav class="nav-category">
                        <h2>Categories</h2>
                        <ul class="menu-category">
                            <li><a href="#">Fashions</a></li>
                            <li><a href="#">Electronics</a></li>
                            <li><a href="#">Home and Kitchen</a></li>
                            <li><a href="#">Baby and Toys</a></li>
                            <li><a href="#">Sports</a></li>
                            <li><a href="#">Digital Goods</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-md-9">
                    <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner shadow-sm rounded">
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="{{ url('/template') }}/assets/img/slides/slide1.jpg" alt="First slide">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>Mountains, Nature Collection</h5>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="{{ url('/template') }}/assets/img/slides/slide2.jpg" alt="Second slide">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>Freedom, Sea Collection</h5>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="{{ url('/template') }}/assets/img/slides/slide3.jpg" alt="Third slide">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>Living the Dream, Lost Island</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Slider -->
                </div>
            </div>
        </div>
    </div>
</section>

<section class="products-grids trending pb-4 pt-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2>PRE - ORDER</h2>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            @foreach ($paket as $item)
            @php
            $gambar_paket = GambarPaket::where("idpaket", $item->id_paket)->first();
            @endphp
            <div class="col-xl-3 col-lg-4 col-md-4 col-12">
                <div class="single-product">
                    <div class="product-img">
                        <a href="product-detail.html">
                            <img src="{{ url('/uploads/paketpreorder/'.$gambar_paket->cover_paket) }}" style="width: 100%; height: 300px;" class="img-fluid" />
                        </a>
                    </div>
                    <div class="product-content">
                        <h3>
                            <a href="product-detail.html">
                                {{ $item->nama_paket }}
                            </a>
                        </h3>
                        <div class="product-price">
                            <span>
                                Rp. {{ number_format($item->harga_paket) }}
                            </span>
                        </div>
                        <br>
                        Stok : {{ $item->qty_paket }}
                        <br><br>
                        <form action="{{ url('/beli/'.$item->id_paket) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary btn-block btn-sm">
                                <i class="fa fa-shopping-cart"></i> Beli
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="products-grids trending pb-4 pt-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2>Artikel</h2>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-xl-3 col-lg-4 col-md-4 col-12">
                <div class="single-product">
                    <div class="product-img">
                        <a href="product-detail.html">
                            <img src="{{ url('/img/artikel2.jpg') }}" class="img-fluid" />
                        </a>
                    </div>
                    <div class="product-content">
                        <h3>
                            <a href="#">
                                Judul Artikel 1
                            </a>
                        </h3>
                        <div class="product-price">
                            <span>
                                <p class="text-justify">
                                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Facilis error maiores, quia laboriosam quae culpa...
                                </p>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-4 col-12">
                <div class="single-product">
                    <div class="product-img">
                        <a href="product-detail.html">
                            <img src="{{ url('/img/artikel2.jpg') }}" class="img-fluid" />
                        </a>
                    </div>
                    <div class="product-content">
                        <h3>
                            <a href="#">
                                Judul Artikel 2
                            </a>
                        </h3>
                        <div class="product-price">
                            <span>
                                <p class="text-justify">
                                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Facilis error maiores, quia laboriosam quae culpa...
                                </p>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-4 col-12">
                <div class="single-product">
                    <div class="product-img">
                        <a href="product-detail.html">
                            <img src="{{ url('/img/artikel2.jpg') }}" class="img-fluid" />
                        </a>
                    </div>
                    <div class="product-content">
                        <h3>
                            <a href="#">
                                Judul Artikel 3
                            </a>
                        </h3>
                        <div class="product-price">
                            <span>
                                <p class="text-justify">
                                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Facilis error maiores, quia laboriosam quae culpa...
                                </p>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-4 col-12">
                <div class="single-product">
                    <div class="product-img">
                        <a href="product-detail.html">
                            <img src="{{ url('/img/artikel2.jpg') }}" class="img-fluid" />
                        </a>
                    </div>
                    <div class="product-content">
                        <h3>
                            <a href="#">
                                Judul Artikel 4
                            </a>
                        </h3>
                        <div class="product-price">
                            <span>
                                <p class="text-justify">
                                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Facilis error maiores, quia laboriosam quae culpa...
                                </p>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
