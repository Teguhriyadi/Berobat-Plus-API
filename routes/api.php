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
use App\Http\Controllers\API\Akun\Public\ActivateAccountController;
use App\Http\Controllers\API\Akun\Public\PictureController;
use App\Http\Controllers\API\Autentikasi\LoginController;
use App\Http\Controllers\API\DashboardController;
use App\Http\Controllers\API\Master\Artikel\DataArtikelController;
use App\Http\Controllers\API\Master\Artikel\DetailArtikelController;
use App\Http\Controllers\API\Master\Artikel\GroupingArtikelController;
use App\Http\Controllers\API\Master\Artikel\KategoriArtikelController;
use App\Http\Controllers\API\Master\DokterKeahlianController;
use App\Http\Controllers\API\Master\KeahlianDokterController;
use App\Http\Controllers\API\Master\Obat\DataObatController;
use App\Http\Controllers\API\Master\Obat\GolonganObatController;
use App\Http\Controllers\API\Master\Obat\Transaksi\TransaksiObatKeluarController;
use App\Http\Controllers\API\Master\Obat\Transaksi\TransaksiObatMasukController;
use App\Http\Controllers\API\Master\Pengaturan\ProfilController;
use App\Http\Controllers\API\Master\RoleController;
use App\Http\Controllers\Apotek\Pengaturan\ProfilApotekController;
use App\Http\Controllers\TesXenditController;
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

Route::get("/create-api", [DashboardController::class, "create_api"]);

Route::prefix("autentikasi")->group(function () {
    Route::post("/login", [LoginController::class, "login"]);
    Route::get("/login", function () {
        return response()->json([
            "pesan" => "Anda Harus Login Terlebih Dahulu",
            "status" => 401
        ]);
    })->name("login");
});

Route::resource("/tagihan", TesXenditController::class);
Route::get("/callback", [TesXenditController::class, "callback"]);


Route::middleware("auth:sanctum")->group(function () {
    Route::prefix("akun")->group(function () {

        Route::put("/update-picture", [PictureController::class, "update_picture"]);

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

        Route::put("/active_account/{id_user}", [ActivateAccountController::class, "active_account"]);

        Route::put("/change_password", [ChangePasswordController::class, "change_password"]);
    });

    Route::prefix("master")->group(function () {

        Route::get("/artikel/{slug}", [DetailArtikelController::class, "index"]);
        Route::resource("role", RoleController::class);
        Route::resource("kategori_artikel", KategoriArtikelController::class);
        Route::resource("artikel", DataArtikelController::class);
        Route::resource("grouping_artikel", GroupingArtikelController::class);

        Route::prefix("obat")->group(function () {
            Route::resource("data_obat", DataObatController::class);
            Route::resource("golongan_obat", GolonganObatController::class);
            Route::resource("transaksi_obat_masuk", TransaksiObatMasukController::class);
            Route::resource("transaksi_obat_keluar", TransaksiObatKeluarController::class);
        });

        Route::prefix("pengaturan")->group(function () {
            Route::resource("profil", ProfilController::class);
        });

        Route::resource("keahlian", KeahlianDokterController::class);
        Route::resource("dokter_keahlian", DokterKeahlianController::class);
    });

    Route::prefix("apotek")->group(function () {
        Route::prefix("pengaturan")->group(function () {
            Route::put("/profil_apotek/aktifkan", [ProfilApotekController::class, "aktifkan"]);
            Route::put("/profil_apotek/non_aktifkan", [ProfilApotekController::class, "non_aktifkan"]);
            Route::resource("profil_apotek", ProfilApotekController::class);
        });
    });

    Route::get("/count_data", [DashboardController::class, "dashboard"]);

    Route::get("/logout", [LoginController::class, "logout"]);
});
