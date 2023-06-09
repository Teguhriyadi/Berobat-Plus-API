<?php

use App\Http\Controllers\API\Master\Perawat\KeahlianPerawatController;
use Illuminate\Support\Facades\Route;

Route::prefix("perawat")->group(function() {
    Route::resource('keahlian_perawat', KeahlianPerawatController::class);
});