<?php

namespace App\Models\Pengaturan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SyaratKetentuan extends Model
{
    use HasFactory;

    protected $table = "syarat_ketentuan";

    protected $guarded = [''];

    protected $primaryKey = "id_syarat_ketentuan";

    protected $keyType = 'string';

    public $incrementing = false;
}
