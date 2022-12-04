<!-- Modal -->
        <div id="deleteModal" tabindex="-1" class="modal fade" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Katalog</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('destroy.katalog', '') }}" method="POST">
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
                            @foreach ($katalogs as $katalog)
                            <tr>
                                <td>{{ $katalog->id_katalog }}</td>
                                <td>{{ $katalog->nama_katalog }}</td>
                                <td>{{ $katalog->slug }}</td>
                                <td>
                                    <a href = "{{ url('admin/katalog/'.$katalog->id_katalog.'/edit') }}" class = "btn btn-success">Ubah</a>
                                    <a href = "#" data-bs-toggle = "modal" data-bs-target = "#deleteModal" class = "btn btn-danger" data-id="{{ $katalog->id_katalog }}">Hapus</a>
                                </td>
                            </tr>
                                
                            @endforeach
                        </tbody>
                    </table>

                    {{-- pagination --}}
                    <div>
                        {{-- $katalogs->links() --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    @push('script')
        <script>
            // window.addEventListener('close-modal', event => {
            //     $('#deleteModal').modal('hide');
            // });

            $('#deleteModal').on('show.bs.modal', function(e) {
                let button = $(e.relatedTarget);
                let id = button.attr('data-id');

                let modal = $(this);
                modal.find('form').attr('action', `/admin/katalog/${id}`)
            })

        
             /*function deleteKatalog(){
                @this.call('deleteKatalog');
                $('#deleteConfirmation').modal('hide');
            } gabisa manggil*/
        </script>
    @endpush