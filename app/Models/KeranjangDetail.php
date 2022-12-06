<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeranjangDetail extends Model
{
    use HasFactory;

    protected $table = "keranjang_detail";

    protected $guarded = [''];

    public function preoder()
    {
        return $this->belongsTo("App\Models\PaketPreorder", "id_paket", "id_paket");
    }
}
