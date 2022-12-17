<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penulis extends Model
{
    use HasFactory;

    protected $table = "penulis";

    protected $guarded = [''];

    public $primaryKey = "id_penulis";

    protected $keyType = 'string';

    public $incrementing = false;

    public function users()
    {
        return $this->belongsTo("App\Models\User", "user_id", "id_users");
    }
}
