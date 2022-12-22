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
        Schema::create('transaksi', function (Blueprint $table) {
            $table->string("id_transaksi")->primary();
            $table->string("customer_id", 50);
            $table->datetime("tanggal_pembelian");
            $table->double("total_pembelian");
            $table->text("alamat_pemesanan");
            $table->string("status_pembelian", 50);
            $table->string("resi_pengiriman", 50)->nullable();
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
        Schema::dropIfExists('transaksi');
    }
};
