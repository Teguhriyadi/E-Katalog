<?php

namespace App\Models\Akun;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Editor extends Model
{
    use HasFactory;

    protected $table = "editor";

    protected $guarded = [''];

    public $primaryKey = "id_editor";
}
