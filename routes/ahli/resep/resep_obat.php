<?php

use App\Http\Controllers\API\Transaksi\ResepObatController;
use App\Http\Controllers\API\Transaksi\ResepObatDetailController;
use Illuminate\Support\Facades\Route;

Route::prefix("resep")->group(function() {
    Route::resource("/detail_obat", ResepObatDetailController::class);
    Route::resource('obat', ResepObatController::class);
});