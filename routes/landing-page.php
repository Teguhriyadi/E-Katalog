<?php

use App\Http\Controllers\User\ArtikelController;
use App\Http\Controllers\User\KatalogController;
use App\Http\Controllers\User\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get("/", [UserController::class, "home"]);
Route::get("/login", [LoginController::class, "login"]);
Route::get("/daftar", [LoginController::class, "daftar"]);
Route::prefix("voting")->group(function() {
    Route::prefix("penulis")->group(function() {

    });
});

Route::prefix("blog")->group(function() {
    Route::get("/detail/{slug}", [ArtikelController::class, "detail"]);
});

Route::prefix("katalog")->group(function() {
    Route::get("/detail/{slug}", [KatalogController::class, "detail"]);
});

Route::post("kirim_pesan", [UserController::class, "kirim_pesan"]);
