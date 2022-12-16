<?php

namespace App\Models\Web;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use HasFactory;

    protected $table = "artikel";

    protected $guarded = [''];

    public function users()
    {
        return $this->belongsTo("App\Models\User", "users_id", "id_users");
    }

    public function katalog()
    {
        return $this->belongsTo("App\Models\Katalog", "kategori_id", "id_katalog");
    }

}
