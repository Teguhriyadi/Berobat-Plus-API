<?php

use App\Http\Controllers\API\Akun\AllAccountController;
use App\Http\Controllers\API\Akun\ChangePasswordController;
use App\Http\Controllers\API\Akun\CompanyController;
use App\Http\Controllers\API\Akun\DokterController;
use App\Http\Controllers\API\Akun\KonsumenController;
use App\Http\Controllers\API\Akun\OwnerApotekController;
use App\Http\Controllers\API\Akun\OwnerRumahSakitController;
use App\Http\Controllers\API\Akun\PerawatController;
use App\Http\Controllers\API\Akun\Public\ActivateAccountController;
use App\Http\Controllers\API\Akun\Public\PictureController;
use App\Http\Controllers\API\Autentikasi\LoginController;
use App\Http\Controllers\API\DashboardController;
use App\Http\Controllers\API\Master\Ahli\KeahlianController;
use App\Http\Controllers\API\Master\Artikel\DataArtikelController;
use App\Http\Controllers\API\Master\Artikel\DetailArtikelController;
use App\Http\Controllers\API\Master\Artikel\GroupingArtikelController;
use App\Http\Controllers\API\Master\Artikel\KategoriArtikelController;
use App\Http\Controllers\API\Master\CariKeahlianController;
use App\Http\Controllers\API\Master\CariRumahSakitController;
use App\Http\Controllers\API\Master\Obat\GolonganObatController;
use App\Http\Controllers\API\Master\Obat\Transaksi\TransaksiObatKeluarController;
use App\Http\Controllers\API\Master\Obat\Transaksi\TransaksiObatMasukController;
use App\Http\Controllers\API\Master\Pengaturan\ProfilController;
use App\Http\Controllers\API\Master\Penyakit\SpesialisPenyakitController;
use App\Http\Controllers\API\Master\Produk\KategoriProdukController;
use App\Http\Controllers\API\Master\RoleController;
use App\Http\Controllers\API\Master\RumahSakit\GetSpesialisDokterController;
use App\Http\Controllers\API\Master\RumahSakit\SpesialisRumahSakitController;
use App\Http\Controllers\API\Produk\DataProdukController;
use App\Http\Controllers\API\Produk\ProdukKategoriController;
use App\Http\Controllers\API\Tes\CekResiController;
use App\Http\Controllers\API\Tes\RajaOngkirController;
use App\Http\Controllers\Apotek\Pengaturan\ProfilApotekController;
use App\Http\Controllers\ChatingController;
use App\Http\Controllers\DiagnosaController;
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

Route::post("/kirim-pesan", [ChatingController::class, "index"]);

Route::post("invoice", [DashboardController::class, "invoice"]);

Route::post("callback", [DashboardController::class, "callback"]);

Route::post("/tes_ongkir", [RajaOngkirController::class, "index"]);

Route::get("/create-api", [DashboardController::class, "create_api"]);
Route::get("/resi", [CekResiController::class, "index"]);

require __DIR__ . '/auth/login.php';

Route::prefix("akun")->group(function () {
    Route::resource("/konsumen", KonsumenController::class);
});

Route::middleware("auth:sanctum")->group(function () {
    
    Route::prefix("akun")->group(function () {
        
        Route::put("/update-picture", [PictureController::class, "update_picture"]);

        Route::get("/all_account", [AllAccountController::class, "index"]);
        Route::resource("/company", CompanyController::class);
        
        Route::get("/dokter/data", [DokterController::class, "data"]);
        Route::get("/dokter/{uid_partner}", [DokterController::class, "uid_partner"]);
        Route::resource("/dokter", DokterController::class);
        
        Route::get("/perawat/data", [PerawatController::class, "data"]);
        Route::resource("/perawat", PerawatController::class);
        
        Route::resource("/apotek", OwnerApotekController::class);
        Route::resource("/owner_rs", OwnerRumahSakitController::class);

        Route::prefix("profil")->group(function () {
            
            require __DIR__ . '/account/profil/admin/profil.php';
            
            require __DIR__ . '/account/profil/apotek/login.php';
            
            require __DIR__ . '/account/profil/perawat/profil.php';
            
            require __DIR__ . '/account/profil/konsumen/profil.php';
            
            require __DIR__ . '/account/profil/dokter/profil.php';
        });
        
        Route::put("/active_account/{id_user}", [ActivateAccountController::class, "active_account"]);
        
        Route::put("/active_account/{id_dokter}/dokter", [ActivateAccountController::class, "active_account_dokter"]);

        Route::put("/change_password", [ChangePasswordController::class, "change_password"]);
    });

    Route::prefix("master")->group(function () {
        
        require __DIR__ . '/ahli/jadwal/antrian.php';
        require __DIR__ . '/ahli/jadwal/praktek.php';
        require __DIR__ . '/ahli/detail/praktek.php';
        require __DIR__ . '/ahli/keahlian/master_keahlian.php';
        
        Route::prefix("cari")->group(function() {
            Route::post("/keahlian", [CariKeahlianController::class, "index"]);
            Route::post("/rumah_sakit", [CariRumahSakitController::class, "index"]);
        });

        Route::prefix("produk")->group(function () {
            Route::resource("kategori_produk", KategoriProdukController::class);
        });

        Route::get("/artikel/{user_id}/get", [DataArtikelController::class, "get_by_id"]);
        Route::get("/artikel/{slug}", [DetailArtikelController::class, "index"]);
        Route::resource("role", RoleController::class);
        Route::resource("kategori_artikel", KategoriArtikelController::class);
        Route::resource("artikel", DataArtikelController::class);
        Route::get("/grouping_artikel/{id_artikel}/get", [GroupingArtikelController::class, "list_by_artikel"]);
        Route::resource("grouping_artikel", GroupingArtikelController::class);

        Route::prefix("obat")->group(function () {
            Route::resource("golongan_obat", GolonganObatController::class);
            Route::resource("transaksi_obat_masuk", TransaksiObatMasukController::class);
            Route::resource("transaksi_obat_keluar", TransaksiObatKeluarController::class);
        });

        Route::prefix("pengaturan")->group(function () {
            Route::resource("profil", ProfilController::class);
        });

        Route::resource("keahlian", KeahlianController::class);

        Route::prefix("rumah_sakit")->group(function () {

            require __DIR__ . '/master/rumah_sakit/data.php';

            Route::prefix("spesialis")->group(function() {
                Route::get("/{id_rumah_sakit}", [SpesialisRumahSakitController::class, "index"]);
                Route::post("/{id_rumah_sakit}", [SpesialisRumahSakitController::class, "store"]);
                Route::get("/{id_rumah_sakit}/{id_spesialis}", [SpesialisRumahSakitController::class, "edit"]);
                Route::put("/{id_spesialis}", [SpesialisRumahSakitController::class, "update"]);
                Route::delete("/{id_spesialis}", [SpesialisRumahSakitController::class, "destroy"]);
            });

            require __DIR__ . '/master/rumah_sakit/fasilitas.php';
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
            Route::post("/profil_apotek/find_nearest", [ProfilApotekController::class, "find_nearest"]);
            Route::put("/profil_apotek/ubah_status/{id_profil_apotek}", [ProfilApotekController::class, "ubah_status"]);
            Route::resource("profil_apotek", ProfilApotekController::class);
        });

        Route::prefix("produk")->group(function () {
            Route::get("/data_produk/by_owner", [DataProdukController::class, "get_by_owner"]);
            Route::get("/data_produk/by_owner/{id_profil_apotek}/get", [DataProdukController::class, "get_produk_by_owner"]);
            Route::resource("/data_produk", DataProdukController::class);
            Route::resource("/produk_kategori", ProdukKategoriController::class);
        });
    });

    require __DIR__ . '/xendit/pembayaran.php';

    Route::get("/count_data", [DashboardController::class, "dashboard"]);

    Route::get("/logout", [LoginController::class, "logout"]);
});

Route::post("/tes-diagnosa", [DiagnosaController::class, "diagnosa"]);
