<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view ("admin.dashboard");
    }

    public function dashboard_editor()
    {
        return view("editor.v_dashboard");
    }

    public function dashboard_penulis()
    {
        return view("penulis.v_dashboard");
    }
}
