<?php

use App\Http\Controllers\API\Master\Pembelian\PembelianController;
use Illuminate\Support\Facades\Route;

Route::prefix("pembelian")->group(function() {
    Route::resource("/transaksi", PembelianController::class);
});