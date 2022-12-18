<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesan extends Model
{
    use HasFactory;

    protected $table = "pesan";

    protected $guarded = [''];

    protected $primaryKey = "id_pesan";

    protected $keyType = 'string';

    public $incrementing = false;
}
