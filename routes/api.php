<?php

use App\Http\Controllers\API\Akun\AllAccountController;
use App\Http\Controllers\API\Akun\ChangePasswordController;
use App\Http\Controllers\API\Akun\CompanyController;
use App\Http\Controllers\API\Akun\DokterController;
use App\Http\Controllers\API\Akun\KonsumenController;
use App\Http\Controllers\API\Akun\OwnerApotekController;
use App\Http\Controllers\API\Akun\PerawatController;
use App\Http\Controllers\API\Akun\Profile\Admin\ProfileController;
use App\Http\Controllers\API\Akun\Profile\Apotek\ProfileController as ApotekProfileController;
use App\Http\Controllers\API\Akun\Profile\Perawat\ProfileController as PerawatProfileController;
use App\Http\Controllers\API\Autentikasi\LoginController;
use App\Http\Controllers\API\Master\Obat\GolonganObatController;
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
    Route::get("/login", function () {
        return response()->json([
            "pesan" => "Anda Harus Login Terlebih Dahulu",
            "status" => 401
        ]);
    })->name("login");
});

Route::middleware("auth:sanctum")->group(function () {
    Route::prefix("akun")->group(function () {
        Route::get("/all_account", [AllAccountController::class, "index"]);
        Route::resource("/company", CompanyController::class);
        Route::resource("/dokter", DokterController::class);
        Route::resource("/konsumen", KonsumenController::class);
        Route::resource("/perawat", PerawatController::class);
        Route::resource("/apotek", OwnerApotekController::class);

        Route::prefix("profil")->group(function () {
            Route::prefix("admin")->group(function () {
                Route::get("/profil", [ProfileController::class, "get_profil"]);
                Route::put("/profil", [ProfileController::class, "update_profil"]);
            });

            Route::prefix("apotek")->group(function () {
                Route::get("/profil", [ApotekProfileController::class, "get_profil"]);
                Route::put("/profil", [ApotekProfileController::class, "update_profil"]);
            });

            Route::prefix("perawat")->group(function () {
                Route::get("/profil", [PerawatProfileController::class, "get_profil"]);
                Route::put("/profil", [PerawatProfileController::class, "update_profil"]);
            });
        });

        Route::put("/change_password", [ChangePasswordController::class, "change_password"]);
    });

    Route::prefix("master")->group(function () {
        Route::resource("role", RoleController::class);

        Route::prefix("obat")->group(function () {
            Route::resource("golongan_obat", GolonganObatController::class);
        });
    });

    Route::get("/logout", [LoginController::class, "logout"]);
});
