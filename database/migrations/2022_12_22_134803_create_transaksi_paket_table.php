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
        Schema::create('transaksi_paket', function (Blueprint $table) {
            $table->string("id_pembelian_paket", 50)->primary();
            $table->string("id_transaksi", 50);
            $table->string("kode_paket", 50);
            $table->integer("jumlah");
            $table->string("nama_paket", 100);
            $table->double("harga");
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
        Schema::dropIfExists('transaksi_paket');
    }
};
