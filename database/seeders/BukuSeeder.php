<?php

namespace Database\Seeders;

use App\Models\Buku;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Buku::create([
            "id_buku" => "PBB001",
            "judul_buku" => "Si Kancil",
            "nama_penulis" => "Mohammad Ilham",
            "tgl_terbit" => "2022-12-12",
            "halaman" => "230",
            "ukuran" => "15 x 17",
            "isbn" => "123-456-78",
            "cover_buku" => "https://images.unsplash.com/photo-1668943731874-d40d92993c61?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHx0b3BpYy1mZWVkfDF8NnNNVmpUTFNrZVF8fGVufDB8fHx8&auto=format&fit=crop&w=500&q=60",
            "keterangan_buku" => "Bagus dan Keren",
            "slug" => "si-kancil",
            "status_buku" => 1
        ]);

        Buku::create([
            "id_buku" => "PBB002",
            "judul_buku" => "Kancil dan Buaya",
            "nama_penulis" => "Mohammad Farhan",
            "tgl_terbit" => "2022-12-01",
            "halaman" => "230",
            "ukuran" => "15 x 17",
            "isbn" => "123-456-80",
            "cover_buku" => "https://images.unsplash.com/photo-1669281151275-1d430c0a3496?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHx0b3BpYy1mZWVkfDR8NnNNVmpUTFNrZVF8fGVufDB8fHx8&auto=format&fit=crop&w=500&q=60",
            "keterangan_buku" => "Good Job",
            "slug" => "kancil-dan-buaya",
            "status_buku" => 1
        ]);
    }
}
