@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class = "card">
            <div class = "card-header">
                <h3> Ubah Katalog
                    <a href = "{{ url('admin/katalog/') }}" class = "btn btn-primary btn-sm text-white float-end"> Kembali</a>
                </h3>
            </div>
            <div class="card-body">

                {{-- form isian katalog--}}
                <form action="{{ url('admin/katalog/'.$katalog->id_katalog) }}" method = "POST">
                    @csrf {{-- csrf token--}}
                    @method('PUT') {{-- ngereplace record data --}}
                    <div class = row>
                        {{-- kode katalog --}}
                        <div class = "col-md-12 mb-4">
                            <label>Kode Katalog</label>
                            <input type = "text" name = "id_katalog" value = "{{ $katalog->id_katalog }}" class = "form-control" />
                            @error('id_katalog') <small class = "text-danger">{{ $message }}</small>

                            @enderror
                            
                        </div>

                        {{-- nama  katalog --}}
                        <div class = "col-md-12 mb-3">
                            <label>Nama Katalog</label>
                            <input type = "text" name = "nama_katalog" value = "{{ $katalog->nama_katalog }}" class = "form-control" />
                            @error('nama_katalog') 
                                <small class = "text-danger"> 
                                    {{ $message }} 
                                </small> 
                            @enderror
                        </div>

                        {{-- slug --}}
                        <div class = "col-md-12 mb-3">
                            <label>Slug</label>
                            <input type = "text" name = "slug" value = "{{ $katalog->slug }}" class = "form-control" />
                            @error('slug') 
                                <small class = "text-danger"> 
                                    {{ $message }} 
                                </small> 
                            @enderror
                        </div>

                        {{-- submit  --}}
                        <div class = "col-md-12 mb-3">
                            <button type = "submit" class = "btn btn-primary float-end">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection