<?php

namespace App\Http\Controllers\Admin\Account;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class PenulisController extends Controller
{
    public function index()
    {
        $data["penulis"] = User::where("role", "editor")->get();

        return view("admin.users.penulis.v_index", $data);
    }
}
