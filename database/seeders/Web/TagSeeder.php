<?php

namespace Database\Seeders\Web;

use App\Models\Master\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::create([
            "nama" => "Novel",
            "slug" => "novel"
        ]);

        Tag::create([
            "nama" => "Kisah Remaja",
            "slug" => "kisah-remaja"
        ]);

        Tag::create([
            "nama" => "Referensi Buku",
            "slug" => "referensi-buku"
        ]);
    }
}
