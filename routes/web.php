<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\PeninjauController;
use App\Http\Controllers\ProposalController;

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

Route::group(['middleware' => 'check.role:dosen'], function () {
    Route::get('/home', [DosenController::class, "home"])->name("home");
    Route::get('/tambah-proposal', [DosenController::class, "tambah"])->name("tambah");
    Route::post('/tambah-proposal', [ProposalController::class, "handleTambahProposal"])->name("proposal.tambah");
    Route::get("/tambah-anggota", [DosenController::class, "tambahAnggota"])->name("tambahanggota");
    Route::get("/sukses", [DosenController::class, "succes"])->name("succes");
    Route::get("/detail-proposal/{id}", [DosenController::class, "details"])->name("detailProposal");
});

Route::group(['middleware' => 'check.role:peninjau'], function () {
   Route::get("/daftar-tinjauan", [PeninjauController::class, "index" ])->name("daftarTinjauan");
});


Route::group(['middleware' => 'check.login'], function() {
    Route::get("/register", [AuthController::class, "register"])->name("register");
    Route::post("/handle-register", [AuthController::class, "handleRegister"])->name("auth.post.register");
    Route::get("/", [AuthController::class, "login"])->name("login");
    Route::post("/login", [AuthController::class, "handleLogin"])->name("auth.post.login");
});

Route::get('/download/{filename}', [ProposalController::class, "download"])->name('download');
Route::get("/logout", [AuthController::class, "logout"])->name("auth.logout");
