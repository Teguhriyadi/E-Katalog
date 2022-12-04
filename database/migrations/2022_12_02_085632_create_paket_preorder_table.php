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
        Schema::create('paket_preorder', function (Blueprint $table) {
            $table->string('id_paket', 6)->primary();
            $table->string('idkatalog', 6)->nullable();
            $table->string('idbuku', 6)->nullable();
            $table->string('cover_paket')->nullable();
            $table->string('nama_paket');
            $table->integer('harga_paket');
            $table->integer('qty_paket');
            $table->longText('desc_paket');
            $table->string('slug');
            $table->tinyInteger('status_paket')->default('0');
        });

        Schema::table('paket_preorder', function (Blueprint $table){
            $table->foreign('idkatalog')->references('id_katalog')->on('katalog_produk');
            $table->foreign('idbuku')->references('id_buku')->on('databuku')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paket_preorder');
    }
};
