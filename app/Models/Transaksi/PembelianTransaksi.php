<?php

namespace App\Models\Transaksi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembelianTransaksi extends Model
{
    use HasFactory;

    protected $table = "transaksi";

    protected $guarded = [''];

    public $primaryKey = "id_transaksi";

    protected $keyType = 'string';

    public $incrementing = false;
}
