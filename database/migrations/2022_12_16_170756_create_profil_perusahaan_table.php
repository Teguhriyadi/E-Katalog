<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profil_perusahaan', function (Blueprint $table) {
            $table->string("id_profil")->primary();
            $table->string("nama_perusahaan", 100);
            $table->string("deskripsi_singkat", 100);
            $table->text("deskripsi");
            $table->string("nomor_hp", 20);
            $table->string("email", 100);
            $table->text("alamat");
            $table->string("foto");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profil_perusahaan');
    }
};
