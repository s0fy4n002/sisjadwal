<?php

use App\Http\Controllers\GuruController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JamSettingsController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\PelajaranController;
use App\Http\Controllers\PenjadwalanController;
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
Route::middleware(['auth'])->group(function(){
    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::resource('guru', GuruController::class);
    Route::resource('level', LevelController::class);
    Route::resource('jam-slot', JamSettingsController::class);
    Route::prefix('kelas')->name('kelas.')->group(function () {
        Route::get('/', [KelasController::class, 'index'])->name('index');
        Route::get('/create', [KelasController::class, 'create'])->name('create');
        Route::post('/', [KelasController::class, 'store'])->name('store');
        Route::get('/{kelas}', [KelasController::class, 'show'])->name('show');
        Route::get('/{kelas}/edit', [KelasController::class, 'edit'])->name('edit');
        Route::put('/{kelas}', [KelasController::class, 'update'])->name('update');
        Route::delete('/{kelas}', [KelasController::class, 'destroy'])->name('destroy');
    });
    Route::resource('pelajaran', PelajaranController::class);
    Route::resource('penjadwalan', PenjadwalanController::class);
    Route::get('/change-password', [HomeController::class, 'change_password'])->name('change_password');
    Route::post('/change-password', [HomeController::class, 'proses_change_password'])->name('proses_change_password');

});

Route::get('/login', [HomeController::class, 'login'])->name('login');
Route::post('/login-proses', [HomeController::class, 'login_process'])->name('login_proses');
Route::get('/logout', [HomeController::class, 'logout'])->name('logout');
