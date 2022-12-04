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
        Schema::create('databuku', function (Blueprint $table) {
            $table->string('id_buku', 6)->primary();
            $table->string('judul_buku');
            $table->string('nama_penulis');
            $table->date('tgl_terbit')->nullable();
            $table->string('nama_penerbit',100);
            $table->string('halaman',10)->nullable();
            $table->string('ukuran',10)->nullable();
            $table->string('isbn',20)->nullable();
            $table->string('cover_buku')->nullable();
            $table->text('keterangan_buku');
            $table->string('slug');
            $table->tinyInteger('status_buku')->default('0');
     
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('databuku');
    }
};
