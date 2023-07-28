<?php

use App\Http\Controllers\API\Xendit\XenditController;
use Illuminate\Support\Facades\Route;

Route::prefix("xendit")->group(function() {
    Route::get("/bank", [XenditController::class, "list_bank"]);
});