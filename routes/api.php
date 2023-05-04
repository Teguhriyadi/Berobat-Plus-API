<?php

use App\Http\Controllers\API\Akun\AllAccountController;
use App\Http\Controllers\API\Akun\ChangePasswordController;
use App\Http\Controllers\API\Akun\CompanyController;
use App\Http\Controllers\API\Akun\DokterController;
use App\Http\Controllers\API\Akun\KonsumenController;
use App\Http\Controllers\API\Akun\OwnerApotekController;
use App\Http\Controllers\API\Akun\PerawatController;
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
use App\Http\Controllers\API\Master\Obat\GolonganObatController;
use App\Http\Controllers\API\Master\Obat\Transaksi\TransaksiObatKeluarController;
use App\Http\Controllers\API\Master\Obat\Transaksi\TransaksiObatMasukController;
use App\Http\Controllers\API\Master\Pengaturan\ProfilController;
use App\Http\Controllers\API\Master\Pengiriman\RajaOngkirController as PengirimanRajaOngkirController;
use App\Http\Controllers\API\Master\Penyakit\SpesialisPenyakitController;
use App\Http\Controllers\API\Master\Produk\KategoriProdukController;
use App\Http\Controllers\API\Master\RoleController;
use App\Http\Controllers\API\Master\RumahSakit\DataRumahSakitController;
use App\Http\Controllers\API\Master\RumahSakit\FasilitasRumahSakitController;
use App\Http\Controllers\API\Master\RumahSakit\GetSpesialisDokterController;
use App\Http\Controllers\API\Master\RumahSakit\SpesialisRumahSakitController;
use App\Http\Controllers\API\Produk\DataProdukController;
use App\Http\Controllers\API\Produk\ProdukKategoriController;
use App\Http\Controllers\API\Tes\RajaOngkirController;
use App\Http\Controllers\Apotek\Pengaturan\ProfilApotekController;
use App\Http\Controllers\DiagnosaController;
use App\Http\Controllers\LocationController;
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

Route::post("/tes_ongkir", [RajaOngkirController::class, "index"]);

Route::get("/findNearest", [LocationController::class, "findNearest"]);

Route::get("/create-api", [DashboardController::class, "create_api"]);

require __DIR__ . '/auth/login.php';

Route::prefix("akun")->group(function () {
    Route::resource("/konsumen", KonsumenController::class);
});

Route::middleware("auth:sanctum")->group(function () {

    Route::prefix("akun")->group(function () {

        Route::put("/update-picture", [PictureController::class, "update_picture"]);

        Route::get("/all_account", [AllAccountController::class, "index"]);
        Route::resource("/company", CompanyController::class);

        Route::get("/dokter/{uid_partner}", [DokterController::class, "uid_partner"]);
        Route::get("/dokter/semua_data", [DokterController::class, "all_data"]);
        Route::resource("/dokter", DokterController::class);
        Route::resource("/perawat", PerawatController::class);
        Route::resource("/apotek", OwnerApotekController::class);

        Route::prefix("profil")->group(function () {

            require __DIR__ . '/account/profil/admin/profil.php';

            require __DIR__ . '/account/profil/apotek/login.php';

            require __DIR__ . '/account/profil/perawat/profil.php';

            require __DIR__ . '/account/profil/konsumen/profil.php';

            require __DIR__ . '/account/profil/dokter/profil.php';
        });

        Route::put("/active_account/{id_user}", [ActivateAccountController::class, "active_account"]);

        Route::put("/change_password", [ChangePasswordController::class, "change_password"]);
    });

    Route::prefix("master")->group(function () {

        Route::prefix("produk")->group(function () {
            Route::resource("kategori_produk", KategoriProdukController::class);
        });

        Route::get("/artikel/{slug}", [DetailArtikelController::class, "index"]);
        Route::resource("role", RoleController::class);
        Route::resource("kategori_artikel", KategoriArtikelController::class);
        Route::resource("artikel", DataArtikelController::class);
        Route::resource("grouping_artikel", GroupingArtikelController::class);

        Route::prefix("obat")->group(function () {
            Route::resource("golongan_obat", GolonganObatController::class);
            Route::resource("transaksi_obat_masuk", TransaksiObatMasukController::class);
            Route::resource("transaksi_obat_keluar", TransaksiObatKeluarController::class);
        });

        Route::prefix("pengaturan")->group(function () {
            Route::resource("profil", ProfilController::class);
        });

        Route::resource("keahlian", KeahlianDokterController::class);

        Route::get("/dokter_keahlian/{id_keahlian}/ambil_keahlian", [DokterKeahlianController::class, "show"]);
        Route::resource("dokter_keahlian", DokterKeahlianController::class);

        Route::prefix("rumah_sakit")->group(function () {
            Route::resource("/data", DataRumahSakitController::class);
            Route::get("/spesialis/{id_rumah_sakit}", [SpesialisRumahSakitController::class, "index"]);

            Route::get("/fasilitas_rs/rs/{id_rumah_sakit}", [FasilitasRumahSakitController::class, "get_list_fasilitas"]);
            Route::resource("fasilitas_rs", FasilitasRumahSakitController::class);
        });
        Route::prefix("spesialis")->group(function () {
            Route::get("/{id_spesialis}/{id_rumah_sakit}", [GetSpesialisDokterController::class, "index"]);
        });

        Route::prefix("penyakit")->group(function () {
            Route::resource("/spesialis_penyakit", SpesialisPenyakitController::class);
        });

        require __DIR__ . '/master/transaksi/rajaongkir/pengiriman.php';
    });

    Route::prefix("apotek")->group(function () {
        Route::prefix("pengaturan")->group(function () {
            Route::put("/profil_apotek/aktifkan", [ProfilApotekController::class, "aktifkan"]);
            Route::put("/profil_apotek/non_aktifkan", [ProfilApotekController::class, "non_aktifkan"]);
            Route::resource("profil_apotek", ProfilApotekController::class);
        });

        Route::prefix("produk")->group(function () {
            Route::resource("/data_produk", DataProdukController::class);
            Route::resource("/produk_kategori", ProdukKategoriController::class);
        });
    });

    Route::get("/count_data", [DashboardController::class, "dashboard"]);

    Route::get("/logout", [LoginController::class, "logout"]);
});

Route::post("/tes-diagnosa", [DiagnosaController::class, "diagnosa"]);
