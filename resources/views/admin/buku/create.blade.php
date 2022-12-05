@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class = "card">
            <div class="card-header">
                <h3>Tambah Buku
                <a href="{{ url('admin/buku') }}" class = "btn btn-primary btn-sm float-end">Kembali</a>
                </h3>
            </div>

            {{-- form isian --}}
            <div class = "card-body">
                <form action="{{ url('admin/buku') }}" enctype="multipart/form-data" method = "POST">
                    @csrf
                    <div class = row>
                        {{-- kode katalog --}}
                        <div class="mb-3">
                            <label>Kode Buku</label>
                            <input type = "text" name = "id_buku" minlength="6" maxlength="6" placeholder="cont: LP0001" class = "form-control" />
                            @error('id_buku')
                                <small class = "text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>

                        <!--gambar ntr dibuat pengingat sizenya max brp-->
                        <div class="mb-3">
                            <label>Cover</label>
                            <input type = "file" name = "cover_buku" class = "form-control" />
                            @error('cover_buku')
                                <small class = "text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label>Judul</label>
                            <input type = "text" name = "judul_buku" placeholder="cont: Elegi Haekal" class = "form-control" />
                            @error('judul_buku')
                                <small class = "text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label>Penulis</label>
                            <input type = "text" name = "nama_penulis" placeholder="cont: Dhia'an Farah" class = "form-control" />
                            @error('nama_penulis')
                                <small class = "text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label>Tanggal Terbit</label>
                            <input type = "date" name = "tgl_terbit" class = "form-control" />
                            @error('tgl_terbit')
                                <small class = "text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label>Halaman</label>
                            <input type = "text" name = "halaman" minlength="2" placeholder="cont: 230 hlm." class = "form-control" />
                            @error('halaman')
                                <small class = "text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label>Ukuran</label>
                            <input type = "text" name = "ukuran" placeholder="13 x 19 cm " class = "form-control" /> <!-- name.defer sama kaya -foo | buat save data yg diinput -->
                            @error('ukuran')
                                <small class = "text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label>ISBN</label>
                            <input type = "text" name= "isbn" minlength="17" maxlength="20" placeholder="cont: 978-623-310-060-1" class = "form-control" />
                            @error('isbn')
                                <small class = "text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label>Keterangan</label>
                            <textarea name= "keterangan_buku" placeholder="Isi dengan sinopsis atau keterangan lainnya." class = "form-control"> </textarea>
                            @error('keterangan_buku')
                                <small class = "text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <input type = "checkbox" name = "status_buku"/>
                            <label>Tersedia untuk pre-order.</label>
                            <!--<select class = "form-control" name = "pre">
                                <option value= "1"> Pre Order </option>
                                <option value= "0"> Tidak Tersedia </option>
                            </select> -->

                            @error('status_buku')
                                <small class = "text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>

                        {{-- submit --}}
                        <div class = "col-md-12 mb-3">
                            <button type = "submit" class = "btn btn-primary float-end">Simpan</button>
                        </div>
                    </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
