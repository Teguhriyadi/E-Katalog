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
