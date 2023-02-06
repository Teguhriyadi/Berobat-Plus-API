<?php

use App\Http\Controllers\API\Akun\CompanyController;
use App\Http\Controllers\API\Autentikasi\LoginController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix("autentikasi")->group(function () {
    Route::post("/login", [LoginController::class, "login"]);
});

Route::middleware("auth:sanctum")->group(function () {
    Route::prefix("akun")->group(function () {
        Route::resource("/company", CompanyController::class);
    });
});
