<?php

use App\Http\Controllers\Editor\Account\ProfilController;
use App\Http\Controllers\Editor\Master\NaskahController;
use App\Http\Controllers\Editor\Voting\VotingController;
use App\Http\Controllers\Public\DashboardController;
use Illuminate\Support\Facades\Route;

Route::group(["middleware" => ["can:editor"]], function() {
    Route::prefix("editor")->group(function() {
        Route::get("/dashboard", [DashboardController::class, "dashboard_editor"]);
        Route::prefix("master")->group(function() {
            Route::get("/naskah", [NaskahController::class, "index"]);
            Route::get("/naskah/{id}/download", [NaskahController::class, "download"]);
            Route::put("/naskah/{id}", [NaskahController::class, "update"]);
        });
        Route::prefix("users")->group(function() {
            Route::resource("/update_profil", ProfilController::class);
            Route::put("/ubah_password", [ProfilController::class, "ubah_password"]);
        });
        Route::prefix("voting")->group(function() {
            Route::resource("pembaca", VotingController::class);
        });
    });
});
