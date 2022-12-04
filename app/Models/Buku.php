<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $table = 'databuku';

    protected $fillable = [
        'id_buku',
        'judul_buku',
        'nama_penulis',
        'tgl_terbit',
        'halaman',
        'ukuran',
        'isbn',
        'cover_buku',
        'keterangan_buku',
        'slug',
        'status_buku'
    ];
    
    protected $primaryKey = 'id_buku';

    protected $keyType = 'string';

    public $incrementing = false;

    public $timestamps = false;
    
}
