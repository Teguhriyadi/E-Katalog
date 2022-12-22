<?php

namespace App\Models\Transaksi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembelianTransaksiPaket extends Model
{
    use HasFactory;

    protected $table = "transaksi_paket";

    protected $guarded = [''];

    public $primaryKey = "id_pembelian_paket";

    protected $keyType = 'string';

    public $incrementing = false;
}
