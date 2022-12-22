
@extends("user.main")

@section("title", "Home")

@section("content")
<!-- ======= Hero Section ======= -->
<section id="hero" class="hero">
    <div class="info d-flex align-items-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <h2 data-aos="fade-down">
                        Selamat Datang di <span>Loveable</span>
                    </h2>
                    <p data-aos="fade-up">
                        Apa Yang Kamu Cari ? Artikel atau Seputar Konten Tentang Kisah Remaja? Atau Kamu Sedang Mencari Referensi Buku ?
                    </p>
                    <a data-aos="fade-up" data-aos-delay="200" href="#about" class="btn-get-started">
                        Dapatkan Disini
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
        @php
        $no = 1;
        @endphp
        @foreach ($carousel as $item)
        @if ($no == 1)
        <div class="carousel-item active" style="background-image: url('{{ $item->foto }}')"></div>
        @else
        <div class="carousel-item" style="background-image: url('{{ $item->foto }}')"></div>
        @endif
        @php
        ++$no;
        @endphp

        @endforeach

        <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
        </a>
    </div>
</section>
<!-- End Hero Section -->

<!-- ======= Get Started Section ======= -->
<section id="about" class="about">
    <div class="container" data-aos="fade-left">
        <div class="row position-relative">
            <div class="col-lg-7 about-img" style="background-image: url(assets/img/hero-carousel/1.jpeg)">
            </div>

            <div class="col-lg-7">
                <h2>Tentang Loveable</h2>
                <div class="our-story">
                    <h3>Our Story</h3>
                    <p>
                        Inventore aliquam beatae at et id alias. Ipsa dolores amet
                        consequuntur minima quia maxime autem. Quidem id sed ratione.
                        Tenetur provident autem in reiciendis rerum at dolor. Aliquam
                        consectetur laudantium temporibus dicta minus dolor.
                    </p>
                    <p>
                        Vitae autem velit excepturi fugit. Animi ad non. Eligendi et
                        non nesciunt suscipit repellendus porro in quo eveniet.
                        Molestias in maxime doloremque.
                    </p>

                    <div class="watch-video d-flex align-items-center position-relative">
                        <i class="bi bi-play-circle"></i>
                        <a href="https://www.youtube.com/watch?v=LXb3EKWsInQ"
                        class="glightbox stretched-link">Watch Video</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Get Startemodisid Section -->

<!-- ======= Services Section ======= -->
<section id="services" class="services section-bg">
    <div class="container" data-aos="fade-right">
        <div class="section-header">
            <h2>Pengembangan Bidang</h2>
            <p>
                Kami bergerak di beberapa bidang dalam melayani customer / pelanggan kami
            </p>
        </div>

        <div class="row gy-4">
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="service-item position-relative">
                    <div class="icon">
                        <i class="fa-solid fa-mountain-city"></i>
                    </div>
                    <h3>Nesciunt Mete</h3>
                    <p>
                        Provident nihil minus qui consequatur non omnis maiores. Eos
                        accusantium minus dolores iure perferendis tempore et
                        consequatur.
                    </p>
                    <a href="service-details.html" class="readmore stretched-link">Choose <i
                        class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
                <!-- End Service Item -->

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="service-item position-relative">
                        <div class="icon">
                            <i class="fa-solid fa-arrow-up-from-ground-water"></i>
                        </div>
                        <h3>Eosle Commodi</h3>
                        <p>
                            Ut autem aut autem non a. Sint sint sit facilis nam iusto
                            sint. Libero corrupti neque eum hic non ut nesciunt dolorem.
                        </p>
                        <a href="service-details.html" class="readmore stretched-link">Choose <i
                            class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                    <!-- End Service Item -->

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="service-item position-relative">
                            <div class="icon">
                                <i class="fa-solid fa-compass-drafting"></i>
                            </div>
                            <h3>Ledo Markt</h3>
                            <p>
                                Ut excepturi voluptatem nisi sed. Quidem fuga consequatur.
                                Minus ea aut. Vel qui id voluptas adipisci eos earum corrupti.
                            </p>
                            <a href="service-details.html" class="readmore stretched-link">Choose <i
                                class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                        <!-- End Service Item -->

                        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
                            <div class="service-item position-relative">
                                <div class="icon">
                                    <i class="fa-solid fa-trowel-bricks"></i>
                                </div>
                                <h3>Asperiores Commodit</h3>
                                <p>
                                    Non et temporibus minus omnis sed dolor esse consequatur.
                                    Cupiditate sed error ea fuga sit provident adipisci neque.
                                </p>
                                <a href="service-details.html" class="readmore stretched-link">Choose <i
                                    class="bi bi-arrow-right"></i></a>
                                </div>
                            </div>
                            <!-- End Service Item -->

                            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
                                <div class="service-item position-relative">
                                    <div class="icon">
                                        <i class="fa-solid fa-helmet-safety"></i>
                                    </div>
                                    <h3>Velit Doloremque</h3>
                                    <p>
                                        Cumque et suscipit saepe. Est maiores autem enim facilis ut
                                        aut ipsam corporis aut. Sed animi at autem alias eius labore.
                                    </p>
                                    <a href="service-details.html" class="readmore stretched-link">Choose <i
                                        class="bi bi-arrow-right"></i></a>
                                    </div>
                                </div>
                                <!-- End Service Item -->

                                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
                                    <div class="service-item position-relative">
                                        <div class="icon">
                                            <i class="fa-solid fa-arrow-up-from-ground-water"></i>
                                        </div>
                                        <h3>Dolori Architecto</h3>
                                        <p>
                                            Hic molestias ea quibusdam eos. Fugiat enim doloremque aut
                                            neque non et debitis iure. Corrupti recusandae ducimus enim.
                                        </p>
                                        <a href="service-details.html" class="readmore stretched-link">Choose <i
                                            class="bi bi-arrow-right"></i></a>
                                        </div>
                                    </div>
                                    <!-- End Service Item -->
                                </div>
                            </div>
                        </section>
                        <!-- End Services Section -->

                        <section id="recent-blog-posts" class="recent-blog-posts">
                            <div class="container" data-aos="fade-up">
                                <div class="section-header">
                                    <h2>Paket</h2>
                                    <p>
                                        Beberapa Jenis Paket Yang Bisa Jadikan Referensi. Silahkan Pilih Jenis Paket Yang Kamu Inginkan.
                                    </p>
                                </div>

                                <div class="row gy-5">
                                    @forelse ($paket as $data)
                                    <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                                        <div class="post-item position-relative h-100">
                                            <div class="post-img position-relative overflow-hidden">
                                                <img src="{{ $data->cover_paket }}" class="img-fluid" style="height: 300px">
                                                <span class="post-date">December 12</span>
                                            </div>

                                            <div class="post-content d-flex flex-column">
                                                <h3 class="post-title">
                                                    {{ $data->nama_paket }}
                                                </h3>
                                                <h5 class="post-title">
                                                    Rp. {{ number_format($data->harga_paket) }}
                                                </h5>

                                                <div class="meta d-flex align-items-center">
                                                    <div class="d-flex align-items-center">
                                                        @php
                                                        $waktu = strtotime(date("YmdHis"));

                                                        $tanggal = strtotime($data["tanggal"]);

                                                        if ($waktu > $tanggal) {
                                                            $diff = 1;
                                                        } else {
                                                            $diff = 0;
                                                        }
                                                        @endphp
                                                        <span class="ps-2">
                                                            @if ($diff == 1)
                                                                <span class="badge badge-succes" style="background-color: green; color: white">
                                                                    Pre - Order
                                                                </span>
                                                            @elseif($diff == 0)
                                                                <span class="badge badge-danger" style="background-color: red; color: white;">
                                                                    Segera Terbit
                                                                </span>
                                                            @endif
                                                        </span>
                                                    </div>
                                                    <span class="px-3 text-black-50">/</span>
                                                    <div class="d-flex align-items-center">
                                                        <span class="ps-2">QTY : {{ $data->qty_paket }} </span>
                                                    </div>
                                                </div>

                                                <hr />

                                                @if ($diff == 1)
                                                <form action="{{ url('/beli/'.$data->id_paket) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-warning btn-sm" style="width: 100%">
                                                        <i class="fa fa-check"></i> Beli
                                                    </button>
                                                </form>
                                                @elseif($diff == 0)

                                                @endif

                                            </div>
                                        </div>
                                    </div>
                                    @empty
                                    <div class="col-md-12">
                                        <div class="alert alert-danger text-center">
                                            <strong>
                                                <i>
                                                    Maaf, Data Paket Saat Ini Belum Tersedia
                                                </i>
                                            </strong>
                                        </div>
                                    </div>
                                    @endforelse
                                </div>
                            </div>
                        </section>

                        <!-- ======= Testimonials Section ======= -->
                        <section id="testimonials" class="testimonials section-bg mt-5">
                            <div class="container" data-aos="fade-right">
                                <div class="section-header">
                                    <h2>Apa Kata Mereka</h2>
                                    <p>
                                        Dibawah ini adalah beberapa pendapat dari para pengguna yang telah mengunjungi website
                                    </p>
                                </div>

                                <div class="slides-2 swiper">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <div class="testimonial-wrap">
                                                <div class="testimonial-item">
                                                    <img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img"
                                                    alt="" />
                                                    <h3>Saul Goodman</h3>
                                                    <h4>Ceo &amp; Founder</h4>
                                                    <div class="stars">
                                                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                        class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                        class="bi bi-star-fill"></i>
                                                    </div>
                                                    <p>
                                                        <i class="bi bi-quote quote-icon-left"></i>
                                                        Proin iaculis purus consequat sem cure digni ssim donec
                                                        porttitora entum suscipit rhoncus. Accusantium quam,
                                                        ultricies eget id, aliquam eget nibh et. Maecen aliquam,
                                                        risus at semper.
                                                        <i class="bi bi-quote quote-icon-right"></i>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End testimonial item -->

                                        <div class="swiper-slide">
                                            <div class="testimonial-wrap">
                                                <div class="testimonial-item">
                                                    <img src="assets/img/testimonials/testimonials-2.jpg" class="testimonial-img"
                                                    alt="" />
                                                    <h3>Sara Wilsson</h3>
                                                    <h4>Designer</h4>
                                                    <div class="stars">
                                                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                        class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                        class="bi bi-star-fill"></i>
                                                    </div>
                                                    <p>
                                                        <i class="bi bi-quote quote-icon-left"></i>
                                                        Export tempor illum tamen malis malis eram quae irure esse
                                                        labore quem cillum quid cillum eram malis quorum velit
                                                        fore eram velit sunt aliqua noster fugiat irure amet legam
                                                        anim culpa.
                                                        <i class="bi bi-quote quote-icon-right"></i>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End testimonial item -->

                                        <div class="swiper-slide">
                                            <div class="testimonial-wrap">
                                                <div class="testimonial-item">
                                                    <img src="assets/img/testimonials/testimonials-3.jpg" class="testimonial-img"
                                                    alt="" />
                                                    <h3>Jena Karlis</h3>
                                                    <h4>Store Owner</h4>
                                                    <div class="stars">
                                                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                        class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                        class="bi bi-star-fill"></i>
                                                    </div>
                                                    <p>
                                                        <i class="bi bi-quote quote-icon-left"></i>
                                                        Enim nisi quem export duis labore cillum quae magna enim
                                                        sint quorum nulla quem veniam duis minim tempor labore
                                                        quem eram duis noster aute amet eram fore quis sint minim.
                                                        <i class="bi bi-quote quote-icon-right"></i>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End testimonial item -->

                                        <div class="swiper-slide">
                                            <div class="testimonial-wrap">
                                                <div class="testimonial-item">
                                                    <img src="assets/img/testimonials/testimonials-4.jpg" class="testimonial-img"
                                                    alt="" />
                                                    <h3>Matt Brandon</h3>
                                                    <h4>Freelancer</h4>
                                                    <div class="stars">
                                                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                        class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                        class="bi bi-star-fill"></i>
                                                    </div>
                                                    <p>
                                                        <i class="bi bi-quote quote-icon-left"></i>
                                                        Fugiat enim eram quae cillum dolore dolor amet nulla culpa
                                                        multos export minim fugiat minim velit minim dolor enim
                                                        duis veniam ipsum anim magna sunt elit fore quem dolore
                                                        labore illum veniam.
                                                        <i class="bi bi-quote quote-icon-right"></i>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End testimonial item -->

                                        <div class="swiper-slide">
                                            <div class="testimonial-wrap">
                                                <div class="testimonial-item">
                                                    <img src="assets/img/testimonials/testimonials-5.jpg" class="testimonial-img"
                                                    alt="" />
                                                    <h3>John Larson</h3>
                                                    <h4>Entrepreneur</h4>
                                                    <div class="stars">
                                                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                        class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                        class="bi bi-star-fill"></i>
                                                    </div>
                                                    <p>
                                                        <i class="bi bi-quote quote-icon-left"></i>
                                                        Quis quorum aliqua sint quem legam fore sunt eram irure
                                                        aliqua veniam tempor noster veniam enim culpa labore duis
                                                        sunt culpa nulla illum cillum fugiat legam esse veniam
                                                        culpa fore nisi cillum quid.
                                                        <i class="bi bi-quote quote-icon-right"></i>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End testimonial item -->
                                    </div>
                                    <div class="swiper-pagination"></div>
                                </div>
                            </div>
                        </section>
                        <!-- End Testimonials Section -->

                        <!-- ======= Recent Blog Posts Section ======= -->
                        <section id="recent-blog-posts" class="recent-blog-posts">
                            <div class="container" data-aos="fade-up">
                                <div class="section-header">
                                    <h2>Artikel</h2>
                                    <p>
                                        Beberapa Artikel Yang Harus Kamu Baca, Pahami dan Hayati
                                    </p>
                                </div>

                                <div class="row gy-5">
                                    @foreach ($artikel as $data)
                                    <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                                        <div class="post-item position-relative h-100">
                                            <div class="post-img position-relative overflow-hidden">
                                                <img src="assets/img/blog/blog-1.jpg" class="img-fluid" alt="" />
                                                <span class="post-date">December 12</span>
                                            </div>

                                            <div class="post-content d-flex flex-column">
                                                <h3 class="post-title">
                                                    {{ $data->judul }}
                                                </h3>

                                                <div class="meta d-flex align-items-center">
                                                    <div class="d-flex align-items-center">
                                                        <i class="bi bi-person"></i>
                                                        <span class="ps-2">{{ $data->users->nama }}</span>
                                                    </div>
                                                    <span class="px-3 text-black-50">/</span>
                                                    <div class="d-flex align-items-center">
                                                        <i class="bi bi-folder2"></i>
                                                        <span class="ps-2">Politics</span>
                                                    </div>
                                                </div>

                                                <hr />

                                                <a href="{{ url('/blog/detail/' . $data->slug) }}" class="readmore stretched-link">
                                                    <span>Selengkapnya</span>
                                                    <i class="bi bi-arrow-right"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </section>
                        <!-- End Recent Blog Posts Section -->

                        @endsection
