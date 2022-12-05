<?php

use App\Http\Controllers\Admin\DashboardController;
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
    });
    Route::get("/logout", [AutentikasiController::class, "logout"]);
});

Route::prefix('admin')->middleware(['auth', 'isAdmin']) -> group(function (){
    //route ke dashboard admin
    // Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class,'index']);

    //route grouping katalog admin
    Route::controller(App\Http\Controllers\Admin\KatalogController::class)->group(function () {
        Route::get('/katalog', 'index')->name('index.katalog');
        Route::get('/katalog/create', 'create');
        Route::post('/katalog', 'store');
        Route::get('/katalog/{katalog}/edit', 'edit'); //'admin/katalog/'.$katalog->id_katalog.'/edit'
        Route::put('/katalog/{katalog}', 'update');
        Route::delete('/katalog/{id}', 'destroy')->name('destroy.katalog');
    });

    //route grouping buku admin
    Route::controller(App\Http\Controllers\Admin\BukuController::class)->group(function () {
        Route::get('/buku', 'index')->name('index.buku');
        Route::get('/buku/create', 'create');
        Route::post('/buku', 'store');
        Route::get('/buku/{buku}/edit', 'edit');
        Route::put('/buku/{buku}', 'update');
        Route::delete('/buku/{id}', 'destroy')->name('destroy.buku');
    });

    //route grouping paket preorder admin
    Route::controller(App\Http\Controllers\Admin\PaketPreorderController::class)->group(function () {
        Route::get('/paketpreorder', 'index')->name('index.paketpreorder');
        Route::get('/paketpreorder/create', 'create'); //->name('create.paketpreorder')
        Route::post('/paketpreorder', 'store');
        Route::get('/paketpreorder/{paketpreorder}/edit', 'edit');
        Route::put('/paketpreorder/{paketpreorder}', 'update');
        Route::get('gambar-paket/{id_gambar_paket}/delete', 'destroyImage'); //route hps gambar bener???
        Route::get('paketpreorder/{id_paket}/delete', 'destroy');
        //Route::delete('/paketpreorder/{id}', 'destroy')->name('destroy.paketpreorder');
    });

});

Auth::routes(); //otentikasi

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



