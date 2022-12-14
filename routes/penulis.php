<?php

use App\Http\Controllers\Penulis\Account\ProfilController;
use App\Http\Controllers\Penulis\Auth\LoginController;
use App\Http\Controllers\Penulis\Dokumen\NaskahController;
use App\Http\Controllers\Public\DashboardController;
use Illuminate\Support\Facades\Route;

Route::prefix("auth/penulis")->group(function() {
    Route::get("/login", [LoginController::class, "login"]);
    Route::post("/login", [LoginController::class, "post_login"]);
    Route::get("/daftar", [LoginController::class, "daftar"]);
    Route::post("/daftar", [LoginController::class, "proses_daftar"]);
});

Route::prefix("penulis")->group(function() {
    Route::get("/dashboard", [DashboardController::class, "dashboard_penulis"]);

    Route::prefix("master")->group(function() {
        Route::resource("naskah", NaskahController::class);
    });

    Route::prefix("users")->group(function() {
        Route::resource("/update_profil", ProfilController::class);
        Route::put("/ubah_password", [ProfilController::class, "ubah_password"]);
    });
});
