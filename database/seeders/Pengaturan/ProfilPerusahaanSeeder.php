<?php

namespace Database\Seeders\Pengaturan;

use App\Models\Pengaturan\ProfilPerusahaan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfilPerusahaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProfilPerusahaan::create([
            "id_profil" => "PRF-" . date("YmdHis"),
            "nama_perusahaan" => "Loveable Publishing",
            "deskripsi_singkat" => "Tempat Mencari Referensi Buku, dan Seputar Kisah Tentang Remaja",
            "deskripsi" => "Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet",
            "nomor_hp" => "085324237299",
            "email" => "loveable@gmail.com",
            "alamat" => "Jakarta Selatan",
            "foto" => ""
        ]);
    }
}
