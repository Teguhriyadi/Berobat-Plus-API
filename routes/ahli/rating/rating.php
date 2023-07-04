<?php

use App\Http\Controllers\Master\Ahli\RatingController;
use Illuminate\Support\Facades\Route;

Route::prefix("ahli")->group(function() {
    Route::get("/rating/{ahli_id}", [RatingController::class, "index"]);
    Route::resource("rating", RatingController::class);
});