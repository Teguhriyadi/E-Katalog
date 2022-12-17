@php
    use Carbon\Carbon;
@endphp

@extends("user.main")

@section("title", $katalog->nama_katalog )

@section("content")

<div class="breadcrumbs d-flex align-items-center" style="background-image: url('{{ url('/') }}/img/kategori1.jpg')">
    <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">
        <h2>Detail Kategori</h2>
        <ol>
            <li>
                <router-link to="/">
                    Home
                </router-link>
            </li>
            <li>Detail Katalog</li>
        </ol>
    </div>
</div>

<section id="blog" class="container blog">
    <div class="row">
        <div class="col-md-8">
            <div id="recent-blog-posts" class="recent-blog-posts">
                <div class="container" data-aos="fade-up">
                    <div class="row">
                        @forelse ($produk as $data)
                        <div class="col-md-6 mb-5" data-aos="fade-up" data-aos-delay="100">
                            <div class="post-item position-relative h-100">
                                <div class="post-img position-relative overflow-hidden">
                                    <img src="{{ $data->foto }}" class="img-fluid" style="height: 300px">
                                    <span class="post-date">
                                        {{ $data->created_at }}
                                    </span>
                                </div>
                                <div class="post-content d-flex flex-column">
                                    <h3 class="post-title">
                                        {{ $data->judul }}
                                    </h3>
                                    <div class="meta d-flex align-items-center">
                                        <div class="d-flex align-items-center">
                                            <i class="bi bi-person"></i>
                                            <span class="ps-2">
                                                {{ $data->users->nama }}
                                            </span>
                                        </div>
                                        <span class="px-3 text-black-50">/</span>
                                        <div class="d-flex align-items-center">
                                            <i class="bi bi-folder2"></i>
                                            <span class="ps-2">
                                                {{ $data->katalog->nama_katalog }}
                                            </span>
                                        </div>
                                    </div>
                                    <hr>
                                    <a href="{{ url('/blog/detail/' . $data->slug) }}" class="readmore stretched-link">
                                        <span>
                                            Selengkapnya
                                        </span>
                                        <i class="bi bi-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="col-md-12">
                            <div class="alert alert-danger">
                                <strong>
                                    Maaf, Data Saat Ini Tidak Ada
                                </strong>
                            </div>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
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
                    <h3 class="sidebar-title">Katalog</h3>
                    <ul class="mt-3">
                        @forelse ($filter_katalog as $filter)
                            <li>
                                <a href="{{ url('/katalog/detail/' . $filter->slug) }}">
                                    {{ $filter->nama_katalog }}
                                    <span>50</span>
                                </a>
                            </li>
                        @empty
                        <div class="alert alert-danger">
                            <strong>
                                Data Tidak Ada
                            </strong>
                        </div>
                        @endforelse
                    </ul>
                </div>

                <div class="sidebar-item recent-posts">
                    <h3 class="sidebar-title">Postingan Terbaru</h3>

                    <div class="mt-3">
                        @forelse ($terbaru as $item)
                        <div class="post-item mt-3">
                            <img src="{{ $item->foto }}" class="img-fluid">
                            <div>
                                <h4>
                                    <a href="{{ url('/blog/detail/' . $item->slug) }}">
                                        {{ $item->judul }}
                                    </a>
                                </h4>
                                <time>
                                    {{ Carbon::createFromFormat('Y-m-d H:i:s', $item->created_at)->isoFormat('D MMMM Y') }}
                                </time>
                            </div>
                        </div>
                        @empty
                        <div class="alert alert-danger">
                            <strong>
                                Data Tidak Ada
                            </strong>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
