<?php

namespace Database\Seeders;

use App\Models\Katalog;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KatalogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Katalog::create([
            "id_katalog" => "KT001",
            "nama_katalog" => "Sepatu Pria",
            "slug" => "sepatu-pria"
        ]);

        Katalog::create([
            "id_katalog" => "KT002",
            "nama_katalog" => "Sepatu Wanita",
            "slug" => "sepatu-wanita"
        ]);
    }
}
