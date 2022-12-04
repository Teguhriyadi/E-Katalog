<!-- Modal -->
        <div id="deleteModal" tabindex="-1" class="modal fade" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data Buku</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('destroy.buku', '') }}" method="POST">
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

<div class="row">
    <div class="col-md-12">

        {{-- nampilin messag suskses --}}
            @if(session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif

        <div class = "card">
            <div class="card-header">
                <h3>Data Buku
                <a href="{{ url('admin/buku/create') }}" class = "btn btn-primary float-end">Tambah Buku</a>
                </h3>
            </div>

            {{-- tabel nampilin list --}}
            <div class = "card-body table-responsive ">
                <table class = "table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Kode Buku</th>
                            <th>Cover Buku</th>
                            <th>Judul</th>
                            <th>Penulis</th>
                            <th>Tgl. Terbit</th>
                            <th>Halaman</th>
                            <th>Ukuran</th>
                            <th>ISBN</th>
                            <th>Ket.</th>
                            <th>Slug</th>
                            <th>Status Buku</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($listbuku as $buku)
                        <tr>
                            <td>{{ $buku->id_buku}}</td>
                            <td>
                                <img src = "{{ asset('/uploads/buku/'.$buku->cover_buku) }}" style = "width: 40px; height: 60px; border-radius:0;"/>
                                {{-- $buku->cover_buku --}}
                            </td>
                            <td>{{ $buku->judul_buku }}</td>
                            <td>{{ $buku->nama_penulis }}</td>
                            <td>{{ $buku->tgl_terbit }}</td>
                            <td>{{ $buku->halaman }}</td>
                            <td>{{ $buku->ukuran }}</td>
                            <td>{{ $buku->isbn }}</td>
                            <td>{{ $buku->keterangan_buku }}</td>
                            <td>{{ $buku->slug }}</td>
                            <td>{{ $buku->status_buku == '1' ? 'Pre-Order':'Tidak Tersedia'}}</td>
                            {{-- action --}}
                            <td>
                                {{-- ubah --}}
                                <a href = "{{ url('admin/buku/'.$buku->id_buku.'/edit') }}" class = "btn btn-success">Ubah</a>
                                {{-- hapus --}}
                                <a href = "#" data-bs-toggle = "modal" data-bs-target="#deleteModal" class = "btn btn-danger" data-id="{{ $buku->id_buku }}">Hapus</a>
                            </td>
                        </tr>
                        @endforeach
                        
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
    
    
@push('script')
<script>
    //window.addEventListener('close-modal', event =>{
    //    $('#deleteBukuModal').modal('hide');

    //});

    $('#deleteModal').on('show.bs.modal', function(e) {
                let button = $(e.relatedTarget);
                let id = button.attr('data-id');

                let modal = $(this);
                modal.find('form').attr('action', `/admin/buku/${id}`)
            })
</script>
@endpush

 {{-- Because she competes with no one, no one can compete with her. --}}