<?php

use App\Http\Controllers\API\Akun\CompanyController;
use App\Http\Controllers\API\Akun\DokterController;
use App\Http\Controllers\API\Akun\KonsumenController;
use App\Http\Controllers\API\Autentikasi\LoginController;
use App\Http\Controllers\API\Master\RoleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix("autentikasi")->group(function () {
    Route::post("/login", [LoginController::class, "login"]);
});

Route::middleware("auth:sanctum")->group(function () {
    Route::prefix("akun")->group(function () {
        Route::resource("/company", CompanyController::class);
        Route::resource("/dokter", DokterController::class);
        Route::resource("/konsumen", KonsumenController::class);
    });

    Route::prefix("master")->group(function () {
        Route::resource("role", RoleController::class);
    });
});
