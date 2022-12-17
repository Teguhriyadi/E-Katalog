@php
    use Carbon\Carbon;
@endphp

@extends("user.main")

@section("title", $detail->judul)

@section("content")

<div class="breadcrumbs d-flex align-items-center" style="background-image: url('{{ url('/') }}/img/kategori1.jpg')">
    <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">
        <h2>Detail Artikel</h2>
        <ol>
            <li>
                <a href="{{ url('/') }}">Home</a>
            </li>
            <li> Detail Artikel </li>
        </ol>
    </div>
</div>

<section id="blog" class="blog">
    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row g-5">
            <div class="col-lg-8">
                <article class="blog-details">
                    <div class="post-img">
                        <img src="{{ $detail->foto }}" alt="" class="img-fluid"/>
                    </div>

                    <h2 class="title">
                        {{ $detail->judul }}
                    </h2>

                    <div class="meta-top">
                        <ul>
                            <li class="d-flex align-items-center">
                                <i class="bi bi-person"></i>
                                <a href="#">
                                    {{ $detail->users->nama }}
                                </a>
                            </li>
                            <li class="d-flex align-items-center">
                                <i class="bi bi-clock"></i>
                                <a href="blog-details.html">
                                    <time datetime="2020-01-01">
                                        {{ Carbon::createFromFormat('Y-m-d H:i:s', $detail->created_at)->isoFormat('D MMMM Y') }}
                                    </time>
                                </a>
                            </li>
                            <li class="d-flex align-items-center">
                                <i class="bi bi-chat-dots"></i>
                                <a href="blog-details.html">12 Comments</a>
                            </li>
                        </ul>
                    </div>
                    <!-- End meta top -->

                    <div class="content">
                        <p>
                            {{ $detail->deskripsi }}
                        </p>
                    </div>

                    <div class="meta-bottom">
                        <i class="bi bi-folder"></i>
                        <ul class="cats">
                            <li>
                                <a href="#">{{ $detail->katalog->nama_katalog }}</a>
                            </li>
                        </ul>

                        <i class="bi bi-tags"></i>
                        <ul class="tags">
                            <li>
                                <a href="#">Creative</a>
                            </li>
                            <li>
                                <a href="#">Tips</a>
                            </li>
                            <li>
                                <a href="#">Marketing</a>
                            </li>
                        </ul>
                    </div>
                </article>
            </div>

            <div class="col-lg-4">
                <div class="sidebar">
                    <div class="sidebar-item search-form">
                        <h3 class="sidebar-title">Search</h3>
                        <form action="" class="mt-3">
                            <input type="text" />
                            <button type="submit">
                                <i class="bi bi-search"></i>
                            </button>
                        </form>
                    </div>

                    <div class="sidebar-item categories">
                        <h3 class="sidebar-title"> Katalog </h3>
                        <ul class="mt-3">
                            @foreach ($katalog as $item)
                            <li>
                                <a href="{{ url('/katalog/detail/' . $item->slug) }}">
                                    {{ $item->nama_katalog }} <span>(25)</span>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="sidebar-item recent-posts">
                        <h3 class="sidebar-title">Artikel Terbaru</h3>

                        <div class="mt-3">
                            @forelse ($artikel as $item)
                            <div class="post-item mt-3">
                                <img src="{{ $item->foto }}" class="img-fluid">
                                <div>
                                    <h4>
                                        <a href="{{ url('/blog/detail/' . $item->slug) }}">
                                            {{ $item->judul }}
                                        </a>
                                    </h4>
                                    <time datetime="2020-01-01">
                                        {{ Carbon::createFromFormat('Y-m-d H:i:s', $item->created_at)->isoFormat('D MMMM Y') }}
                                    </time>
                                </div>
                            </div>
                            @empty
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="alert alert-danger">
                                        <strong>
                                            Data Tidak Ada
                                        </strong>
                                    </div>
                                </div>
                            </div>
                            @endforelse
                        </div>
                    </div>

                    <div class="sidebar-item tags">
                        <h3 class="sidebar-title">Tags</h3>
                        <ul class="mt-3">
                            @forelse ($tags as $item)
                            <li>
                                <a href="#">
                                    {{ $item->nama }}
                                </a>
                            </li>
                            @empty
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="alert alert-danger">
                                        <strong>
                                            Data Tidak Ada
                                        </strong>
                                    </div>
                                </div>
                            </div>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
