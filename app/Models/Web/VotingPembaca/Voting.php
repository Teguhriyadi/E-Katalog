<?php

namespace App\Models\Web\VotingPembaca;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voting extends Model
{
    use HasFactory;

    protected $table = "voting_pembaca";

    protected $guarded = [''];

    protected $primaryKey = "id_voting_pembaca";

    protected $keyType = 'string';

    public $incrementing = false;
}
