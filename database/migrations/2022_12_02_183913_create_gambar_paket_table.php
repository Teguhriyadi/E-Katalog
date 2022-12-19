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
        Schema::create('gambar_paket', function (Blueprint $table) {
            $table->string('id_gambar_paket')->primary();
            $table->string('idpaket')->nullable();
            $table->string('cover_paket')->nullable();

            $table->timestamps();
        });

        Schema::table('gambar_paket', function (Blueprint $table){
            $table->foreign('idpaket')->references('id_paket')->on('paket_preorder')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gambar_paket');
    }
};
