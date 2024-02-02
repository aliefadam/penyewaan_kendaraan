<?php

use App\Http\Controllers\PenyewaanController;
use App\Http\Controllers\UserController;
use App\Models\Penyewaan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['middleware' => 'auth.redirect'], function () {
    // Rute yang memerlukan autentikasi
    Route::get('/dashboard', 'DashboardController@index');
    Route::get("/", [UserController::class, "index"]);
    Route::get("/form-tambah-penyewaan", [UserController::class, "formTambahSewa"]);
    Route::get("/riwayat-penyewaan", [PenyewaanController::class, "riwayatPenyewaan"]);
    Route::post("/tambah-penyewaan", [PenyewaanController::class, "tambahSewa"]);
    Route::post("/search", [PenyewaanController::class, "getDataByTanggal"]);
    Route::get("/download-excel/{tanggal}", [PenyewaanController::class, "exportExcel"]);

    Route::get("/terima/{penyewaan}", [PenyewaanController::class, "terimaPenyewaan"]);
    Route::get("/tolak/{penyewaan}", [PenyewaanController::class, "tolakPenyewaan"]);
});

Route::get("/login", [UserController::class, "tampilLogin"]);
Route::post("/login", [UserController::class, "login"]);
Route::get("/logout", [UserController::class, "logout"]);
