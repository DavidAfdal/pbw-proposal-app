<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
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
Route::get('/home', [HomeController::class, "home"])->name("home");
Route::get('/tambah-proposal', [HomeController::class, "tambah"])->name("tambah");
    Route::post('/tambah-proposal', [ProposalController::class, "handleTambahProposal"])->name("proposal.tambah");
Route::get("/tambah-anggota", [HomeController::class, "tambahAnggota"])->name("tambahanggota");
Route::get("/sukses", [HomeController::class, "succes"])->name("succes");
});

Route::group(['middleware' => 'check.login'], function() {
    Route::get("/register", [AuthController::class, "register"])->name("register");
    Route::post("/handle-register", [AuthController::class, "handleRegister"])->name("auth.post.register");
    Route::get("/", [AuthController::class, "login"])->name("login");
    Route::post("/login", [AuthController::class, "handleLogin"])->name("auth.post.login");
});


Route::get("/logout", [AuthController::class, "logout"])->name("auth.logout");
