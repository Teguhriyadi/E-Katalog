<?php

namespace App\Models;

use PDO;
use App\Models\Katalog;
use App\Models\GambarPaket;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PaketPreorder extends Model
{
    use HasFactory;

    protected $table = 'paket_preorder';

    protected $fillable = [
            'id_paket',
            'idkatalog',
            'idbuku',
            'cover_paket',
            'nama_paket',
            'harga_paket',
            'qty_paket',
            'desc_paket',
            'slug',
            'status_paket'
    ];

    protected $primaryKey = 'id_paket';

    protected $keyType = 'string';

    public $incrementing = false;

    public $timestamps = false;

    public function katalog(){
        return $this->belongsTo(Katalog::class, 'idkatalog', 'id_katalog');
    }

    public function buku(){
        return $this->belongsTo(Buku::class, 'idbuku', 'id_buku');
    }

    public function gambarPaket(){
        return $this->hasMany(GambarPaket::class, 'idpaket', 'id_paket');
    }
}
