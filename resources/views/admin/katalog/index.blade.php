@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">

        {{-- nampilin messag suskses --}}
        @if(session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
        @endif
        <!-- END -->

        <div class = "card">
            <div class = "card-header">
                <h3> Katalog
                    <a href = "{{ url('admin/katalog/create') }}" class = "btn btn-primary btn-sm float-end"> Tambah Katalog</a>
                </h3>
            </div>

            <div class="card-body">
                <table class = "table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Kode Katalog</th>
                            <th>Nama Katalog</th>
                            <th>Slug Katalog</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($katalogs as $katalog)
                        <tr>
                            <td>{{ $katalog->id_katalog }}</td>
                            <td>{{ $katalog->nama_katalog }}</td>
                            <td>{{ $katalog->slug }}</td>
                            <td>
                                <a href = "{{ url('admin/katalog/'.$katalog->id_katalog.'/edit') }}" class = "btn btn-success">Ubah</a>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $katalog->id_katalog }}" class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center">
                                <strong>
                                    <i>
                                        Data Tidak Ada
                                    </i>
                                </strong>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Hapus Data -->
@foreach ($katalogs as $item)
<div id="deleteModal-{{ $item->id_katalog }}" tabindex="-1" class="modal fade" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Katalog</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ url('/admin/katalog/'.$item->id_katalog) }}" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    <h6> Apakah anda ingin menghapus? </h6>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" data-bs-target="#deleteModal">Batalkan</button>
                    <button type="submit" class="btn btn-danger">Ya, Hapus.</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
<!-- END -->

@endsection
