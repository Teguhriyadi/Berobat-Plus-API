<?php

use App\Http\Controllers\API\Master\Ahli\JadwalAntrianController;
use Illuminate\Support\Facades\Route;

Route::prefix("ahli")->group(function() {
    Route::resource("/jadwal_antrian", JadwalAntrianController::class);
});