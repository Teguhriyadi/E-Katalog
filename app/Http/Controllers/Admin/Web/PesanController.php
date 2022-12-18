<?php

namespace App\Http\Controllers\Admin\Web;

use App\Http\Controllers\Controller;
use App\Models\Master\Pesan;
use Illuminate\Http\Request;

class PesanController extends Controller
{
    public function index()
    {
        $data["pesan"] = Pesan::get();

        return view("admin.master.pesan.v_index", $data);
    }
}
