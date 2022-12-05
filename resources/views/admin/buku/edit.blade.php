@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class = "card">
            <div class="card-header">
                <h3>Ubah Data Buku
                <a href="{{ url('admin/buku/') }}" class = "btn btn-primary btn-sm float-end">Kembali</a>
                </h3>
            </div>


            <div class = "card-body">
                {{-- passing url admin/buku dengan mgunakan id_buku patokannya--}}
                <form action="{{ url('admin/buku/'.$buku->id_buku) }}" enctype="multipart/form-data" method = "POST">
                    @csrf
                    @method('PUT')
                    <div class = row>
                        {{-- kode katalog --}}
                        <div class="mb-3">
                            <label>Kode Buku</label>
                            <input type = "text" name = "id_buku" value = "{{ $buku->id_buku }}" minlength="6" maxlength="6" placeholder="cont: LP0001" readonly class = "form-control" />
                            @error('id_buku')
                                <small class = "text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label>Cover</label>
                            <br>
                            <img src = "{{ asset('/uploads/buku/'.$buku->cover_buku) }}" class="img-fluid" accept="image/" style="width: 300px; height: 300px">
                            <br><br>
                            <input type = "file" name = "cover_buku" placeholder="cont: The Prodigy" class = "form-control" />

                            @error('cover_buku')
                                <small class = "text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label>Judul</label>
                            <input type = "text" name = "judul_buku" value = "{{ $buku->judul_buku }}" class = "form-control" />
                            @error('judul_buku')
                                <small class = "text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label>Penulis</label>
                            <input type = "text" name = "nama_penulis" value = "{{ $buku->nama_penulis }}" class = "form-control" />
                            @error('nama_penulis')
                                <small class = "text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label>Tanggal Terbit</label>
                            <input type = "date" name = "tgl_terbit" value = "{{ $buku->tgl_terbit }}"class = "form-control" />
                            @error('tgl_terbit')
                                <small class = "text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label>Halaman</label>
                            <input type = "text" name = "halaman" value = "{{ $buku->halaman }}" minlength="2" class = "form-control" />
                            @error('halaman')
                                <small class = "text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label>Ukuran</label>
                            <input type = "text" name = "ukuran" value = "{{ $buku->ukuran }}" class = "form-control" /> <!-- name.defer sama kaya -foo | buat save data yg diinput -->
                            @error('ukuran')
                                <small class = "text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label>ISBN</label>
                            <input type = "text" name= "isbn" value = "{{ $buku->isbn }}" minlength="17" maxlength="20" class = "form-control" />
                            @error('isbn')
                                <small class = "text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label>Keterangan</label>
                            <textarea name= "keterangan_buku" class = "form-control">{{ $buku->keterangan_buku }}</textarea>
                            @error('keterangan_buku')
                                <small class = "text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <input type = "checkbox" name="status_buku" {{ $buku->status_buku == 1 ? 'checked' : '' }}>
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
