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
        Schema::create('voting_pembaca', function (Blueprint $table) {
            $table->string("id_voting_pembaca")->primary();
            $table->string("judul_voting", 100)->nullable();
            $table->string("url_voting")->nullable();
            $table->text("sinopsis")->nullable();
            $table->string("id_penulis", 50)->nullable();
            $table->string("id_editor", 50);
            $table->string("file_naskah")->nullable();
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
        Schema::dropIfExists('voting_pembaca');
    }
};
