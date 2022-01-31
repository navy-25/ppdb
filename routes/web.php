<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('user.index');
});

Auth::routes();
Route::prefix('ppdb')->group(
    function () {
        Route::get('/', [App\Http\Controllers\LandingController::class, 'index'])->name('web_ppdb');
    }
);
// Auth::routes(['register' => false]);
Route::prefix('admin')->group(
    function () {
        Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
        Route::prefix('pendaftar')->group(
            function () {
                Route::get('/calon/regular', [App\Http\Controllers\PendaftarController::class, 'calon_regular'])->name('calon_regular');
                Route::get('/calon/undangan', [App\Http\Controllers\PendaftarController::class, 'calon_undangan'])->name('calon_undangan');
                Route::get('/calon/{id}/delete', [App\Http\Controllers\PendaftarController::class, 'delete_calon_regular'])->name('delete_calon_regular');
                Route::get('/calon/{id}/view', [App\Http\Controllers\PendaftarController::class, 'view_calon'])->name('view_calon');
                Route::get('/calon/{id}/print', [App\Http\Controllers\PendaftarController::class, 'print_calon'])->name('print_calon');
                Route::get('/calon/{jalur}/getDataCalonPendfatar', [App\Http\Controllers\PendaftarController::class, 'getDataCalonPendfatar'])->name('getDataCalonPendfatar');

                Route::get('/lolos', [App\Http\Controllers\PendaftarController::class, 'peserta_lolos'])->name('peserta_lolos');
                Route::get('/lolos/getDataPesertaLolos', [App\Http\Controllers\PendaftarController::class, 'getDataPesertaLolos'])->name('getDataPesertaLolos');
                Route::get('/cetak-surat/', [App\Http\Controllers\PendaftarController::class, 'cetak_surat'])->name('cetak_surat');
                Route::get('/cetak-surat/{id}/orang-tua-wali', [App\Http\Controllers\PendaftarController::class, 'print_sp_wali'])->name('print_sp_wali');
                Route::get('/cetak-surat/{id}/calon-peserta-didik', [App\Http\Controllers\PendaftarController::class, 'print_sp_calon_peserta_didik'])->name('print_sp_calon_peserta_didik');
                Route::get('/getDataPesertaLolosCetakSurat', [App\Http\Controllers\PendaftarController::class, 'getDataPesertaLolosCetakSurat'])->name('getDataPesertaLolosCetakSurat');
            }
        );
        Route::prefix('akun')->group(
            function () {
                Route::get('/pegawai', [App\Http\Controllers\UsersController::class, 'index'])->name('akun_pegawai');
                Route::get('/pegawai/{id}/delete', [App\Http\Controllers\UsersController::class, 'delete'])->name('delete_pegawai');
                Route::post('/pegawai/{id}/update', [App\Http\Controllers\UsersController::class, 'update'])->name('update_pegawai');
                Route::get('/pegawai/{id}/change-status-pegawai', [App\Http\Controllers\UsersController::class, 'change_status'])->name('change_status_pegawai');
                Route::get('/getDataAkunPegwai', [App\Http\Controllers\UsersController::class, 'getDataAkunPegwai'])->name('getDataAkunPegwai');
            }
        );
    }
);
