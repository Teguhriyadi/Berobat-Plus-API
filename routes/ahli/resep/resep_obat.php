<?php

use App\Http\Controllers\API\Transaksi\ResepObatController;
use Illuminate\Support\Facades\Route;

Route::prefix("resep")->group(function() {
    Route::resource('obat', ResepObatController::class);
});