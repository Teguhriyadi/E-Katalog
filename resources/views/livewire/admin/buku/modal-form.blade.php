<!-- Modal -->
<div wire:ignore.self class="modal fade" id="addBukuModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Buku</h1>
                <button type="button" wire:click="closeModal" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>


        <!--isian form-->
            <form wire:submit.prevent="storeBuku" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Kode Buku</label>
                        <input type = "text" wire:model = "id_buku" minlength="6" maxlength="6" placeholder="cont: LP0001" class = "form-control" />
                        @error('id_buku') 
                            <small class = "text-danger"> 
                                {{ $message }} 
                            </small> 
                        @enderror
                    </div>

        <!--gambar ntr dibuat pengingat sizenya max brp-->
                    <div class="mb-3">
                        <label>Cover</label>
                        <input type = "file" wire:model = "cover_buku" placeholder="cont: The Prodigy" class = "form-control" />
                        @error('cover_buku') 
                            <small class = "text-danger"> 
                                {{ $message }} 
                            </small> 
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Judul</label>
                        <input type = "text" wire:model = "judul_buku" placeholder="cont: Elegi Haekal" class = "form-control" />
                        @error('judul_buku') 
                            <small class = "text-danger"> 
                                {{ $message }} 
                            </small> 
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Penulis</label>
                        <input type = "text" wire:model = "nama_penulis" placeholder="cont: Dhia'an Farah" class = "form-control" />
                        @error('nama_penulis') 
                            <small class = "text-danger"> 
                                {{ $message }} 
                            </small> 
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Tanggal Terbit</label>
                        <input type = "date" wire:model = "tgl_terbit" class = "form-control" />
                        @error('tgl_terbit') 
                            <small class = "text-danger"> 
                                {{ $message }} 
                            </small> 
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Halaman</label>
                        <input type = "text" wire:model = "halaman" minlength="2" placeholder="cont: 230 hlm." class = "form-control" />
                        @error('halaman') 
                            <small class = "text-danger"> 
                                {{ $message }} 
                            </small> 
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Ukuran</label>
                        <input type = "text" wire:model = "ukuran" placeholder="13 cm x 19 cm " class = "form-control" /> <!-- wire:model.defer sama kaya -foo | buat save data yg diinput -->
                        @error('ukuran') 
                            <small class = "text-danger"> 
                                {{ $message }} 
                            </small> 
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label>ISBN</label>
                        <input type = "text" wire:model= "isbn" minlength="17" maxlength="20" placeholder="cont: 978-623-310-060-1" class = "form-control" />
                        @error('isbn') 
                            <small class = "text-danger"> 
                                {{ $message }} 
                            </small> 
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Keterangan</label>
                        <textarea wire:model= "keterangan_buku" placeholder="Isi dengan sinopsis atau keterangan lainnya." class = "form-control"> </textarea>
                        @error('keterangan_buku') 
                            <small class = "text-danger"> 
                                {{ $message }} 
                            </small> 
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Slug</label>
                        <input type = "text" wire:model = "slug" placeholder="cont: elegi-haekal" class = "form-control" />
                        @error('slug') 
                            <small class = "text-danger"> 
                                {{ $message }} 
                            </small> 
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for = "status_buku" wire:model = "status_buku">Status Buku</label>
                        <select class = "form-control" name = "pre">
                            <option value= "1"> Pre Order </option>
                            <option value= "0"> Tidak Tersedia </option>
                        </select>

                        <!--<input type = "checkbox" wire:model = "status_buku"/>
                        <label>Tersedia untuk pre-order.</label> -->

                        @error('status_buku') 
                            <small class = "text-danger"> 
                                {{ $message }} 
                            </small> 
                        @enderror 
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" wire:click="closeModal" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>

        </div>
    </div>
</div>



<!-- update model 
<div wire:ignore.self class="modal fade" id="updateBukuModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data Buku</h1>
                <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close"></button>
            </div> -->


        <!--isian form
            <form wire:submit.prevent="updateBuku" enctype="multipart/form-data">
                @ csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Kode Buku</label>
                        <input type = "text" wire:model = "id_buku" class = "form-control" />
                        @ error('id_buku') 
                            <small class = "text-danger"> 
                                {{ $message }} 
                            </small> 
                        @ enderror
                    </div> -->

        <!--gambar ntr dibuat pengingat sizenya max brp
                    <div class="mb-3">
                        <label>Cover</label>
                        <input type = "file" wire:model = "cover_buku" class = "form-control" />
                        @ error('cover_buku') 
                            <small class = "text-danger"> 
                                { { $message }} 
                            </small> 
                        @ enderror
                    </div> -->

                    <!--<div class="mb-3">
                        <label>Judul</label>
                        <input type = "text" wire:model = "judul_buku" class = "form-control" />
                        @ error('judul_buku') 
                            <small class = "text-danger"> 
                                { $message }} 
                            </small> 
                        @ enderror
                    </div>

                    <div class="mb-3">
                        <label>Penulis</label>
                        <input type = "text" wire:model = "nama_penulis" class = "form-control" />
                        @ error('nama_penulis') 
                            <small class = "text-danger"> 
                                { $message }} 
                            </small> 
                        @ enderror
                    </div>

                    <div class="mb-3">
                        <label>Tanggal Terbit</label>
                        <input type = "date" wire:model = "tgl_terbit" class = "form-control" />
                        @ error('tgl_terbit') 
                            <small class = "text-danger"> 
                                { { $message }} 
                            </small> 
                        @ enderror
                    </div>

                    <div class="mb-3">
                        <label>Halaman</label>
                        <input type = "text" wire:model = "halaman" class = "form-control" />
                        @ error('halaman') 
                            <small class = "text-danger"> 
                                { { $message }} 
                            </small> 
                        @ enderror
                    </div>

                    <div class="mb-3">
                        <label>Ukuran</label>
                        <input type = "text" wire:model = "ukuran" class = "form-control" />  wire:model.defer sama kaya -foo | buat save data yg diinput
                        @ error('ukuran') 
                            <small class = "text-danger"> 
                                { { $message }} 
                            </small> 
                        @ enderror
                    </div> -->
                    
                    <!--<div class="mb-3">
                        <label>ISBN</label>
                        <input type = "text" wire:model = "isbn" class = "form-control" />
                        @ error('isbn') 
                            <small class = "text-danger"> 
                                { { $message }} 
                            </small> 
                        @ enderror
                    </div> -->

                    <!--<div class="mb-3">
                        <label>Keterangan</label>
                        <textarea wire:model = "keterangan_buku" class = "form-control"> </textarea>
                        @ error('keterangan_buku') 
                            <small class = "text-danger"> 
                                { { $message }} 
                            </small> 
                        @ enderror
                    </div> -->

                    <!--<div class="mb-3">
                        <label>Slug</label>
                        <input type = "text" wire:model = "slug" class = "form-control" />
                        @ error('slug') 
                            <small class = "text-danger"> 
                                { { $message }} 
                            </small> 
                        @ enderror
                    </div> -->

                    <!--<div class="mb-3">
        
                        <label for = "status_buku" wire:model = "status_buku">Status Buku</label>
                        <select class = "form-control" placeholder="Pilih Status">
                            <option value= "1"> Pre Order </option>
                            <option value= "0"> Tidak Tersedia </option>
                        </select>

                        @ error('status_buku') 
                            <small class = "text-danger"> 
                                {.{ $message }} 
                            </small> 
                        @ enderror 
                    </div>
                </div> -->

               <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire: click="closeModal" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Ubah</button>
                </div>
            </form>
        </div>
    </div>
</div> -->