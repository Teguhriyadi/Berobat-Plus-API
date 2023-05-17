<?php

use App\Http\Controllers\API\DashboardController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\TesXenditController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get("/pembayaran", [DashboardController::class, "pembayaran"]);
Route::post("/pembayaran", [DashboardController::class, "invoice"]);

Route::get('/', function () {
    return view('welcome');
});

Route::resource("/tes-xendit", TesXenditController::class);
