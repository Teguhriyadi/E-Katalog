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
            $table->string("judul_voting", 100);
            $table->string("url_voting");
            $table->text("sinopsis");
            $table->string("id_editor", 50);
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
