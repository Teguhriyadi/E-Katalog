<?php

use App\Http\Controllers\User\ArtikelController;
use App\Http\Controllers\User\KatalogController;
use App\Http\Controllers\User\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get("/", [UserController::class, "home"]);
Route::get("/login", [LoginController::class, "login"]);
Route::post("/login", [LoginController::class, "post_login"]);
Route::get("/daftar", [LoginController::class, "daftar"]);
Route::post("/daftar", [LoginController::class, "post_daftar"]);
Route::prefix("voting")->group(function() {
    Route::prefix("penulis")->group(function() {

    });
});

Route::get("/logout-user", [UserController::class, "logout_user"]);

Route::prefix("blog")->group(function() {
    Route::get("/detail/{slug}", [ArtikelController::class, "detail"]);
});

Route::prefix("katalog")->group(function() {
    Route::get("/detail/{slug}", [KatalogController::class, "detail"]);
});

Route::post("kirim_pesan", [UserController::class, "kirim_pesan"]);
