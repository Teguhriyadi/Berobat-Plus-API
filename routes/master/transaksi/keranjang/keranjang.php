<?php

use App\Http\Controllers\API\Transaksi\KeranjangController;
use Illuminate\Support\Facades\Route;

Route::prefix("keranjang")->group(function() {
    Route::resource("/", KeranjangController::class);
});