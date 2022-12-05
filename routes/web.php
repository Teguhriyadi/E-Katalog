<?php

use App\Http\Controllers\Admin\BukuController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\KatalogController;
use App\Http\Controllers\Admin\PaketPreorderController;
use App\Http\Controllers\Autentikasi\AutentikasiController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('beranda', [
        "title" => "Beranda"
    ]);
});

Route::get('/katalog', function () {
    return view('katalog', [
        "title" => "Katalog"
    ]);
});

Route::get('/readerspick', function (){
    return view('readerspick', [
        "title" => "Reader's Pick"
    ]);
});

Route::group(["middleware" => ["guest"]], function() {
    Route::get("/auth", [AutentikasiController::class, "login"]);
    Route::post("/auth", [AutentikasiController::class, "post_login"]);
});

Route::group(["middleware" => ["cek_status"]], function() {
    Route::prefix("admin")->group(function() {
        Route::get("/dashboard", [DashboardController::class, "index"]);

        Route::resource("/katalog", KatalogController::class);
        Route::resource("/buku", BukuController::class);
        Route::resource("/paketpreorder", PaketPreorderController::class);
    });
    Route::get("/logout", [AutentikasiController::class, "logout"]);
});

Auth::routes(); //otentikasi

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



