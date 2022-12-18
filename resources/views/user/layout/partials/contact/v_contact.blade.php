<section id="contact" class="contact section-bg">
    <div class="container">
        <div class="section-title">
            <h2>Kontak</h2>
            <p>
                Ayo isi form ini untuk masukan terhadap artikel atau website kami ini agar kami bisa lebih berkembang
            </p>
        </div>

        <div class="row justify-content-center">
            <div class="col-xl-10">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="row justify-content-center">
                            <div class="col-md-6 info d-flex flex-column align-items-stretch">
                                <i class="fas fa-location"></i>
                                <h4>Alamat</h4>
                                <p>
                                    {{ $kontak->alamat }}
                                </p>
                            </div>
                            <div class="col-md-6 info d-flex flex-column align-items-stretch">
                                <i class="fas fa-phone"></i>
                                <h4>Telepon</h4>
                                <p>
                                    {{ $kontak->nomor_hp }}
                                </p>
                            </div>
                            <div class="col-md-6 info d-flex flex-column align-items-stretch">
                                <i class="fas fa-envelope"></i>
                                <h4>Email</h4>
                                <p>
                                    {{ $kontak->email }}
                                </p>
                            </div>
                            <div class="col-md-6 info d-flex flex-column align-items-stretch">
                                <i class="fas fa-times-circle"></i>
                                <h4>Jam Kerja</h4>
                                <p>Mon - Fri: 9AM to 5PM<br />Sunday: 9AM to 1PM</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <form action="{{ url('/kirim_pesan') }}" method="POST" class="info">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nama" class="form-label" style="float: left;">Nama</label>
                                        <input type="text" name="nama" class="form-control" id="nama" required placeholder="Masukkan Nama">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email" class="form-label" style="float: left;"> Email </label>
                                        <input type="email" class="form-control" name="email" id="email" required placeholder="Masukkan E - Mail">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <label for="subjek" class="form-label" style="float: left">Subjek</label>
                                <input type="text" class="form-control" name="subjek" id="subjek" required placeholder="Masukkan Subjek">
                            </div>
                            <div class="form-group mt-3">
                                <label for="pesan" class="form-label" style="float: left;">Pesan</label>
                                <textarea class="form-control" name="pesan" rows="8" required placeholder="Masukkan Pesan"></textarea>
                            </div>
                            <div class="text-center mt-3">
                                <button type="submit" class="btn btn-primary btn-block" style="width: 100%; padding: 5px;">Kirim Pesan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
