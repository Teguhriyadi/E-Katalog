<?php

use App\Http\Controllers\User\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get("/", [UserController::class, "home"]);
Route::get("/login", [LoginController::class, "login"]);
Route::get("/daftar", [LoginController::class, "daftar"]);

