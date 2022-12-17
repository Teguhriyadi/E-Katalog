<?php

use App\Http\Controllers\Public\DashboardController;
use Illuminate\Support\Facades\Route;

Route::group(["middleware" => ["can:editor"]], function() {
    Route::prefix("editor")->group(function() {
        Route::get("/dashboard", [DashboardController::class, "dashboard_editor"]);
    });
});