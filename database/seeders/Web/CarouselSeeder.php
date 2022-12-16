<?php

namespace Database\Seeders\Web;

use App\Models\Web\Carousel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarouselSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Carousel::create([
            "id_carousel" => "CRS-" . date("YmdHis") . "1",
            "judul_carousel" => "Lorem Ipsum",
            "deskripsi" => "lorem ipsum",
            "foto" => url('/img/kategori1.jpg')
        ]);

        Carousel::create([
            "id_carousel" => "CRS-" . date("YmdHis") . "2",
            "judul_carousel" => "Lorem Ipsum",
            "deskripsi" => "lorem ipsum",
            "foto" => url('/img/kat1.jpg')
        ]);

        Carousel::create([
            "id_carousel" => "CRS-" . date("YmdHis") . "3",
            "judul_carousel" => "Lorem Ipsum",
            "deskripsi" => "lorem ipsum",
            "foto" => url('/img/kat2.jpg')
        ]);
    }
}
