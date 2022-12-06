<?php

namespace Database\Seeders\Akun;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "id_users" => date("YmdHis"),
            "nama" => "Administrator",
            "email" => "admin@gmail.com",
            "password" => bcrypt("password"),
            "role" => "admin",
            "created_by" => 0,
            "status" => 1
        ]);
    }
}
