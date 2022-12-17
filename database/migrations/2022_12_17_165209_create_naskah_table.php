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
        Schema::create('naskah', function (Blueprint $table) {
            $table->string("id_naskah", 50)->primary();
            $table->string("judul_naskah", 70);
            $table->text("desc_naskah");
            $table->tinyInteger("kategori_naskah");
            $table->date("tgl_upload");
            $table->tinyInteger("status_naskah")->default(0);
            $table->string("file_naskah");
            $table->string("penulis_id", 50);
            $table->string("editor_id", 50)->nullable();
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
        Schema::dropIfExists('naskah');
    }
};
