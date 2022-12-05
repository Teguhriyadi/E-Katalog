@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class = "card">
            <div class = "card-header">
                <h3> Tambah Paket Pre-Order
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

                    <form action = "{{ url('admin/paketpreorder') }}" method = "POST" enctype="multipart/form-data">
                        @csrf
                        <div class = "mb-3">
                            <label> Kode Paket</label>
                            <input type = "text" name = "id_paket" minlength="6" maxlength="6" placeholder="cont: PP0001" class = "form-control" />
                            @error('id_paket') <small class = "text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <!--ambil value katalog-->
                        <div class = "mb-3 mt-3">
                            <label> Jenis Katalog </label>
                            <select name = "idkatalog" class = "form-control form-select" aria-label="Default select example">
                                <option selected>Pilih Jenis Katalog</option>
                                @foreach ($katalogs as $katalog)
                                <option value = "{{ $katalog->id_katalog }}">{{ $katalog->nama_katalog }}</option>
                                @endforeach
                            </select>
                        </div>
                        <!--nama paket-->
                        <div class = "mb-3">
                            <label> Nama Paket </label>
                            <input type = "text" name = "nama_paket" placeholder="cont: Paket Elegi 1" class = "form-control" />
                            @error('nama_paket') <small class = "text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <!--id buku-->
                        <div class = "mb-3">
                            <label> Judul Buku </label>
                            <select name = "idbuku" class = "form-control form-select" aria-label="Default select example">
                                <option selected>Pilih Buku</option>
                                @foreach ($listbuku as $buku)
                                <option value = "{{ $buku->id_buku }}">{{ $buku->judul_buku }}</option>
                                @endforeach
                            </select>
                        </div>
                        <!--harga paket-->
                        <div class = "mb-3">
                            <label> Harga Paket </label>
                            <input type = "number" name = "harga_paket" placeholder="cont: 58000" class = "form-control" />
                            @error('harga_paket') <small class = "text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <!-- Quantity Paket -->
                        <div class = "mb-3">
                            <label> Kuantitas </label>
                            <input type = "number" name = "qty_paket" placeholder="cont: 20" class = "form-control" />
                            @error('qty_paket') <small class = "text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <!-- deskripsi paket -->
                        <div class = "mb-3">
                            <label> Deskripsi </label>
                            <input type = "text" name = "desc_paket" placeholder="deskripsikan isi paket" class = "form-control" />
                            @error('desc_paket') <small class = "text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class = "mb-3 mt-3">
                            <label> Unggah Gambar Paket Pre-Order</label>
                            <input type = "file" name = "cover_paket[]" multiple class = " multiple form-control">
                        </div>
                        <!-- status paket -->
                        <div class = "mb-3">
                            <input type = "checkbox" name = "status_paket" style="width: 15px; height: 15px;"/>
                            <label> Paket Tersedia </label>
                            @error('desc_paket') <small class = "text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class = "col-md-12 mb-3">
                            <button type = "submit" class = "btn btn-primary float-end">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @endsection
