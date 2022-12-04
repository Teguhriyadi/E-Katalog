@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
         @if(session('message'))
            <h5 class = "alert alert-sucess mb-2"> {{ session('message') }}</h5>
        @endif
        <div class = "card">
            <div class = "card-header">
                <h3> Ubah Data Paket
                    <a href = "{{ url('admin/paketpreorder') }}" class = "btn btn-primary btn-sm text-white float-end">
                        Kembali</a>
                </h3>
            </div>

            <div class = "card-body" style="mb-4">
                
                @if($errors->any())
                <div class - "alert alert-warning">
                    @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                    @endforeach
                </div>
                @endif

                <form action = "{{ url('admin/paketpreorder/'.$paket->id_paket) }}" method = "POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT') {{-- ipdate datanya --}}
                    <!--menu bwt isian paket produk-->
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="detail-tab" data-bs-toggle="tab" data-bs-target="#detail" type="button" role="tab" aria-controls="detail" aria-selected="true">
                                Detail Paket</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="gambarpaket-tab" data-bs-toggle="tab" data-bs-target="#gambarpaket" type="button" role="tab" aria-controls="gambarpaket" aria-selected="false">
                                Gambar Paket</button>
                        </li>
                    </ul>

                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade border p-3 show active" id="detail" role="tabpanel" aria-labelledby="detail-tab">
                            <div class = "mb-3">
                                <label> Kode Paket</label>
                                <input type = "text" name = "id_paket" value = "{{ $paket->id_paket }}" class = "form-control" />
                                    @error('id_paket') <small class = "text-danger">{{ $message }}</small>
                                    @enderror
                            </div>
                            <!--ambil value katalog-->
                            <div class = "mb-3 mt-3">
                                <label> Jenis Katalog </label>
                                <select name = "idkatalog" class = "form-control form-select" aria-label="Default select example">
                                    <option selected>Pilih Jenis Katalog</option>
                                    @foreach ($katalogs as $katalog)
                                    <option value = "{{ $katalog->id_katalog }}" {{ $katalog->id_katalog == $paket->idkatalog ? 'selected' : '' }}>
                                        {{ $katalog->nama_katalog }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!--nama paket-->
                            <div class = "mb-3">
                                <label> Nama Paket </label>
                                <input type = "text" name = "nama_paket" value = "{{ $paket->nama_paket }}" class = "form-control" />
                                    @error('nama_paket') <small class = "text-danger">{{ $message }}</small>
                                    @enderror
                            </div>
                            <!--id buku-->
                            <div class = "mb-3">
                                <label> Judul Buku </label>
                                <select name = "idbuku" class = "form-control form-select" aria-label="Default select example">
                                    <option selected>Pilih Buku</option>
                                    @foreach ($listbuku as $buku)
                                    <option value = "{{ $buku->id_buku }}" {{ $buku->id_buku == $paket->idbuku ? 'selected' : '' }}>
                                    {{ $buku->judul_buku }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!--harga paket-->
                            <div class = "mb-3">
                                <label> Harga Paket </label>
                                <input type = "number" name = "harga_paket" value = "{{ $paket->harga_paket }}" class = "form-control" />
                                    @error('harga_paket') <small class = "text-danger">{{ $message }}</small>
                                    @enderror
                            </div>
                            <!-- Quantity Paket -->
                            <div class = "mb-3">
                                <label> Kuantitas </label>
                                <input type = "number" name = "qty_paket" value = "{{ $paket->qty_paket }}" class = "form-control" />
                                    @error('qty_paket') <small class = "text-danger">{{ $message }}</small>
                                    @enderror
                            </div>
                            <!-- deskripsi paket -->
                            <div class = "mb-3">
                                <label> Deskripsi </label>
                                <input type = "text" name = "desc_paket" value = "{{ $paket->desc_paket }}" class = "form-control" />
                                    @error('desc_paket') <small class = "text-danger">{{ $message }}</small>
                                    @enderror
                            </div>
                            <!-- slug tiap paket -->
                            <div class = "mb-3">
                                <label> Slug </label>
                                <input type = "text" name = "slug" value = "{{ $paket->slug }}" class = "form-control" />
                                    @error('slug') <small class = "text-danger">{{ $message }}</small>
                                    @enderror
                            </div>
                            <!-- status paket -->
                            <div class = "mb-3">
                                <input type = "checkbox" name = "status_paket" {{ $paket->status_paket == '1' ? 'checked' : '' }} style="width: 20px; height: 20px;"/>
                                <label> Paket Tersedia </label>
                                    @error('desc_paket') <small class = "text-danger">{{ $message }}</small>
                                    @enderror
                            </div>
                        </div>

                        {{-- foto unggahan --}}
                        <div class="tab-pane fade border p-3" id="gambarpaket" role="tabpanel" aria-labelledby="gambarpaket-tab">
                            <div class = "mb-3 mt-3">
                                <label> Unggah Gambar Paket Pre-Order</label>
                                <input type = "file" name = "cover_paket[]" multiple class = " multiple form-control">
                            </div>
                            <div> {{-- nampilin gambarnya  --}}
                                @if($paket->gambarPaket)
                                <div class = "row">
                                    @foreach ($paket->gambarPaket as $cover_paket)
                                    <div class = "col-md-2">
                                        <img src = "{{ asset($cover_paket->$cover_paket) }}" style = "width: 80px; height: 80px;" 
                                            class = "me-4 border" alt = "img" />
                                            <a href = "{{ url('admin/gambar-paket/'.$cover_paket->id_gambar_paket.'/delete') }}" class = "d-block"> Hapus </a>
                                    </div>
                                    @endforeach
                                </div>
                                @else
                                    <h5> Tidak ada gambar yang dimasukkan.</h5>
                                @endif
                                
                            </div>
                        </div>

                        <button type = "submit" class = "btn btn-primary"> Simpan </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
