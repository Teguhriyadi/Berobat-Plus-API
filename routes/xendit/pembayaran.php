<?php

use App\Http\Controllers\API\Xendit\PaymentController;
use Illuminate\Support\Facades\Route;

Route::prefix("xendit")->group(function() {
    Route::prefix("va")->group(function() {
        Route::controller(PaymentController::class)->group(function() {
            Route::get("/list", "get_list");
            Route::post("/create", "post_va");
            Route::post("/callback", "callback");
            Route::get("/balance", "balance");
        });
    });
});
