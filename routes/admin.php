<?php

use App\Http\Controllers\Admin\Account\AkunController;
use App\Http\Controllers\Admin\Account\EditorController;
use App\Http\Controllers\Admin\Account\PenulisController;
use App\Http\Controllers\Admin\BukuController;
use App\Http\Controllers\Admin\KatalogController;
use App\Http\Controllers\Admin\Master\TagController;
use App\Http\Controllers\Admin\Pengaturan\ProfilPerusahaanController;
use App\Http\Controllers\Admin\Pengaturan\SyaratKetentuanController;
use App\Http\Controllers\Admin\Web\ArtikelController;
use App\Http\Controllers\Admin\Web\CarouselController;
use App\Http\Controllers\Public\DashboardController;
use Illuminate\Support\Facades\Route;

Route::group(["middleware" => ["can:admin"]], function() {
    Route::prefix("admin")->group(function() {
        Route::get("/dashboard", [DashboardController::class, "index"]);

        Route::prefix("master")->group(function() {
            Route::resource("tag", TagController::class);
            Route::resource("/katalog", KatalogController::class);
            Route::resource("/buku", BukuController::class);
        });

        Route::prefix("web")->group(function() {
            Route::resource("carousel", CarouselController::class);
            Route::resource("artikel", ArtikelController::class);
        });

        Route::prefix("users")->group(function() {
            Route::resource("/editor", EditorController::class);
            Route::resource("/penulis", PenulisController::class);
            Route::resource("/administrator", AkunController::class);
        });

        Route::prefix("pengaturan")->group(function() {
            Route::resource("profil_perusahaan", ProfilPerusahaanController::class);
            Route::resource("syarat_ketentuan", SyaratKetentuanController::class);
        });

        Route::get("/paketpreorder/{id_gambar_paket}/delete", [PaketPreorderController::class, "hapus_gambar_paket"]);
        Route::resource("/paketpreorder", PaketPreorderController::class);
    });
});
