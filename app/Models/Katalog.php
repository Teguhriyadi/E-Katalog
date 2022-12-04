<?php

namespace App\Models;

use App\Models\PaketPreorder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Katalog extends Model
{
    use HasFactory;

    protected $table = 'katalog_produk';

    protected $fillable = [
        'id_katalog',
        'nama_katalog',
        'slug'
    ];

    protected $primaryKey = 'id_katalog';
    
    protected $keyType = 'string';

    public $incrementing = false;

    public $timestamps = false;

    public function paketpreorder(){
        return $this->hasMany(PaketPreorder::class, 'idkatalog', 'id_katalog');
    }

}
