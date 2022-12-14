<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GambarPaket extends Model

{
    use HasFactory;

    protected $table = 'gambar_paket';

    protected $guarded = [''];

    protected $primaryKey = 'id_gambar_paket';

    protected $keyType = 'string';

    public $incrementing = false;

    public $timestamps = false;
}
