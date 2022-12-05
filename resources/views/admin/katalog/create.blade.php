@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class = "card">
            <div class = "card-header">
                <h3> Tambah Katalog
                    <a href = "{{ url('admin/katalog') }}" class = "btn btn-primary btn-sm text-white float-end"> Kembali</a>
                </h3>
            </div>
            <div class="card-body">

                {{-- form isian katalog--}}
                <form action="{{ url('admin/katalog') }}" method = "POST">
                    @csrf
                    <div class = row>
                        {{-- kode katalog --}}
                        <div class = "col-md-12 mb-4">
                            <label>Kode Katalog</label>
                            <input type = "text" name = "id_katalog" minlength="6" maxlength="6" placeholder="cont: KT0001" class = "form-control" />
                            @error('id_katalog') <small class = "text-danger">{{ $message }}</small>

                            @enderror

                        </div>

                        {{-- nama  katalog --}}
                        <div class = "col-md-12 mb-3">
                            <label>Nama Katalog</label>
                            <input type = "text" name = "nama_katalog" placeholder="cont: Buku Fiksi" class = "form-control" />
                        </div>

                        {{-- submit  --}}
                        <div class = "col-md-12 mb-3">
                            <button type = "submit" class = "btn btn-primary float-end">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection
