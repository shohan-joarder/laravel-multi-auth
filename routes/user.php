<?php

use App\Http\Controllers\Auth\UserAuthController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'user'], function () {
    Route::get("/", [UserAuthController::class, "index"])->name("home");
});

Route::get("migrate", function () {
    Artisan::call("migrate");
    return true;
});

Route::get("login", [UserAuthController::class, 'login'])->name("login");
Route::get('logout', [UserAuthController::class, 'logout'])->name("logout");
Route::post("login", [UserAuthController::class, 'authicticate']);
Route::get("register", [UserAuthController::class, 'register'])->name("register");
Route::post("register", [UserAuthController::class, 'saveUser']);
