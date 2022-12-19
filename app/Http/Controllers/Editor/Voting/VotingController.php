<?php

namespace App\Http\Controllers\Editor\Voting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VotingController extends Controller
{
    public function index()
    {

    }

    public function create()
    {
        return view("editor.voting.v_create");
    }
}
