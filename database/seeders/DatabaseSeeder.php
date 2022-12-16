<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Database\Seeders\Akun\UserSeeder;
use Database\Seeders\Pengaturan\ProfilPerusahaanSeeder;
use Database\Seeders\Web\ArtikelSeeder;
use Database\Seeders\Web\CarouselSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(KatalogSeeder::class);
        $this->call(BukuSeeder::class);
        $this->call(ArtikelSeeder::class);
        $this->call(ProfilPerusahaanSeeder::class);
        $this->call(CarouselSeeder::class);
    }
}
