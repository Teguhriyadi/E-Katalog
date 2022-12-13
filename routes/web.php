<?php

use App\Http\Controllers\Admin\Account\AkunController;
use App\Http\Controllers\Admin\Account\EditorController;
use App\Http\Controllers\Admin\Account\PenulisController;
use App\Http\Controllers\Admin\BukuController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\KatalogController;
use App\Http\Controllers\Admin\Master\TagController;
use App\Http\Controllers\Admin\PaketPreorderController;
use App\Http\Controllers\Autentikasi\AutentikasiController;
use App\Http\Controllers\User\LoginController;
use App\Http\Controllers\UserController;
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

Route::get("/login", [LoginController::class, "login"]);
Route::post("/login", [LoginController::class, "post_login"]);
Route::get("/register", [LoginController::class, "register"]);
Route::post("/register", [LoginController::class, "post_register"]);

Route::get("/", [UserController::class, "home"]);
Route::post("/beli/{id_paket}", [UserController::class, "beli"]);
Route::get("/keranjang", [UserController::class, "keranjang"]);
Route::get("/hapus_keranjang/{id}", [UserController::class, "hapus_keranjang"]);
Route::get("/checkout", [UserController::class, "checkout"]);
Route::get("/hapus_checkout/{id}", [UserController::class, "hapus_checkout"]);
Route::post("/checkout", [UserController::class, "post_checkout"]);
Route::get("/sign_out", function() {
    Auth::logout();
    return redirect("/login");
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

Route::get("/data", function() {
    return view("user.layout.main");
});

Route::group(["middleware" => ["guest"]], function() {
    Route::get("/auth", [AutentikasiController::class, "login"]);
    Route::get("/auth/register", [AutentikasiController::class, "register"]);
    Route::post("/auth", [AutentikasiController::class, "post_login"]);
    Route::post("/auth/register", [AutentikasiController::class, "post_register"]);
});

Route::group(["middleware" => ["cek_status"]], function() {
    Route::group(["middleware" => ["can:admin"]], function() {
        Route::prefix("admin")->group(function() {
            Route::get("/dashboard", [DashboardController::class, "index"]);

            Route::prefix("master")->group(function() {
                Route::resource("tag", TagController::class);
                Route::resource("/katalog", KatalogController::class);
                Route::resource("/buku", BukuController::class);
            });

            Route::prefix("users")->group(function() {
                Route::resource("/editor", EditorController::class);
                Route::resource("/penulis", PenulisController::class);
                Route::resource("/administrator", AkunController::class);
            });

            Route::get("/paketpreorder/{id_gambar_paket}/delete", [PaketPreorderController::class, "hapus_gambar_paket"]);
            Route::resource("/paketpreorder", PaketPreorderController::class);
        });
    });

    Route::group(["middleware" => ["can:editor"]], function() {
        Route::prefix("editor")->group(function() {
            Route::get("/dashboard", [DashboardController::class, "dashboard_editor"]);
        });
    });
    Route::get("/logout", [AutentikasiController::class, "logout"]);
});

