<?php

namespace App\Models\Dokumen;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Naskah extends Model
{
    use HasFactory;

    protected $table = "naskah";

    protected $guarded = [''];

    public $primaryKey = "id_naskah";

    protected $keyType = 'string';

    public $incrementing = false;
}
