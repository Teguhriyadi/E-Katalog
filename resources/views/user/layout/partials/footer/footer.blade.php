@php
    use App\Models\Pengaturan\ProfilPerusahaan;
@endphp

<footer id="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-md-6 footer-contact">
                    @php
                        $profil = ProfilPerusahaan::first();
                    @endphp
                    <h3>Loveable</h3>
                    <p>
                        {{ $profil->deskripsi_singkat }} <br />
                        <br>
                        <strong>No. Telepon:</strong> {{ $profil->nomor_hp }} <br />
                        <strong>Email:</strong> {{ $profil->email }} <br />
                    </p>
                </div>

                <div class="col-md-6">
                    <h3>Deskripsi</h3>
                    {{ $profil->deskripsi }}
                </div>
            </div>
        </div>
    </div>
    <div class="container d-md-flex py-4">
        <div class="me-md-auto text-center text-md-start">
            <div class="copyright">
                &copy; Copyright
                <a href="http://www.loveablegroup.id/" target="_blank">
                    <strong>
                        <span>Loveable Publishing</span>
                    </strong>
                </a>. All Rights Reserved
            </div>
            <div class="credits">
                Desain Oleh Sophia Tirova
            </div>
        </div>
    </div>
</footer>
