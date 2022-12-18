<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\Master\Pesan;
use App\Models\Pengaturan\SyaratKetentuan;
use App\Models\User;
use App\Models\Web\Artikel;
use App\Models\Web\Carousel;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data["count_editor"] = User::where("role", "editor")->count();
        $data["count_penulis"] = User::where("role", "penulis")->count();
        $data["count_admin"] = User::where("role", "admin")->count();
        $data["count_buku"] = Buku::count();
        $data["count_artikel"] = Artikel::count();
        $data["count_pesan"] = Pesan::count();
        $data["count_carousel"] = Carousel::count();

        return view ("admin.dashboard", $data);
    }

    public function dashboard_editor()
    {
        return view("editor.v_dashboard");
    }

    public function dashboard_penulis()
    {
        $data["syarat_ketentuan"] = SyaratKetentuan::first();

        return view("penulis.v_dashboard", $data);
    }
}
