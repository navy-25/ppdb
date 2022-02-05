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

// Auth::routes();
Auth::routes(['register' => false]);
Route::prefix('ppdb')->group(
    function () {
        Route::get('/', [App\Http\Controllers\LandingController::class, 'index'])->name('web_ppdb');
        Route::get('/syarat-pendaftaran', [App\Http\Controllers\LandingController::class, 'syarat_pendaftaran'])->name('syarat_pendaftaran');
        Route::get('/jadwal', [App\Http\Controllers\LandingController::class, 'jadwal'])->name('jadwal');
        Route::get('/biaya', [App\Http\Controllers\LandingController::class, 'biaya'])->name('biaya');
        Route::get('/daftar', [App\Http\Controllers\LandingController::class, 'daftar'])->name('daftar');
        Route::post('/daftar/store', [App\Http\Controllers\LandingController::class, 'form_pendaftaran_siswa'])->name('form_pendaftaran_siswa');
        Route::get('/alur-pendaftaran', [App\Http\Controllers\LandingController::class, 'alur_pendaftaran'])->name('alur_pendaftaran');
        Route::get('/cek-status-pendaftaran', [App\Http\Controllers\LandingController::class, 'cek_status_pendaftaran'])->name('cek_status_pendaftaran');
    }
);
Route::group(
    ['middleware' =>  ['auth', 'cek_active_account']],
    function () {
        Route::prefix('admin')->group(
            function () {
                Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
                Route::get('/pengaturan', [App\Http\Controllers\UsersController::class, 'akun_saya'])->name('akun_saya');
                Route::post('/pengaturan/update', [App\Http\Controllers\UsersController::class, 'update_akun_saya'])->name('update_akun_saya');
                Route::prefix('/calon-pendaftar')->group(
                    function () {
                        Route::get('/regular', [App\Http\Controllers\PendaftarController::class, 'calon_regular'])->name('calon_regular');
                        Route::get('/undangan', [App\Http\Controllers\PendaftarController::class, 'calon_undangan'])->name('calon_undangan');
                        Route::get('/{id}/delete', [App\Http\Controllers\PendaftarController::class, 'delete_calon_regular'])->name('delete_calon_regular');
                        Route::get('/{id}/view', [App\Http\Controllers\PendaftarController::class, 'view_calon'])->name('view_calon');
                        Route::get('/{id}/perbarui-calon', [App\Http\Controllers\PendaftarController::class, 'to_update'])->name('to_update');
                        Route::post('/{id}/perbarui-data', [App\Http\Controllers\PendaftarController::class, 'update_calon'])->name('update_calon');
                        Route::get('/{id}/print', [App\Http\Controllers\PendaftarController::class, 'print_calon'])->name('print_calon');
                        Route::get('/{jalur}/getDataCalonPendfatar', [App\Http\Controllers\PendaftarController::class, 'getDataCalonPendfatar'])->name('getDataCalonPendfatar');
                    }
                );
                Route::prefix('/hasil-seleksi')->group(
                    function () {
                        Route::get('/lulus', [App\Http\Controllers\PendaftarController::class, 'peserta_lolos'])->name('peserta_lolos');
                        Route::get('/lulus/getDataPesertaLolos', [App\Http\Controllers\PendaftarController::class, 'getDataPesertaLolos'])->name('getDataPesertaLolos');
                        Route::get('/reject', [App\Http\Controllers\PendaftarController::class, 'peserta_tidak_lolos'])->name('peserta_reject');
                        Route::get('/reject/getDataPesertaTidakLolos', [App\Http\Controllers\PendaftarController::class, 'getDataPesertaTidakLolos'])->name('getDataPesertaTidakLolos');
                    }
                );
                Route::prefix('/seleksi')->group(
                    function () {
                        Route::get('/cek-berkas-peserta', [App\Http\Controllers\PendaftarController::class, 'cek_berkas_undangan'])->name('cek_berkas_undangan');
                        Route::get('/cek-berkas-peserta/getDataPesertaUndangan', [App\Http\Controllers\PendaftarController::class, 'getDataPesertaUndangan'])->name('getDataPesertaUndangan');
                        Route::get('/cek-berkas-peserta/{id}/luluskan', [App\Http\Controllers\PendaftarController::class, 'luluskan_peserta_undangan'])->name('luluskan_peserta_undangan');
                        Route::get('/cek-berkas-peserta-undangan/{id}/tolak', [App\Http\Controllers\PendaftarController::class, 'tolak_peserta_undangan'])->name('tolak_peserta_undangan');
                        Route::get('/hasil-tes', [App\Http\Controllers\PendaftarController::class, 'input_hasil_tes'])->name('input_hasil_tes');
                        Route::get('/hasil-tes/getDataPesertaRegular', [App\Http\Controllers\PendaftarController::class, 'getDataPesertaRegular'])->name('getDataPesertaRegular');
                        Route::get('/hasil-tes/{id}/luluskan', [App\Http\Controllers\PendaftarController::class, 'luluskan_peserta_regular'])->name('luluskan_peserta_regular');
                        Route::get('/hasil-tes/{id}/tolak', [App\Http\Controllers\PendaftarController::class, 'tolak_peserta_regular'])->name('tolak_peserta_regular');
                        Route::post('/hasil-tes/beri-nilai', [App\Http\Controllers\PendaftarController::class, 'save_nilai'])->name('save_nilai');
                    }
                );
                Route::prefix('/peserta-lolos')->group(
                    function () {
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
                Route::prefix('master')->group(
                    function () {
                        Route::get('/jadwal-pendaftaran', [App\Http\Controllers\MasterController::class, 'jadwal_pendaftaran'])->name('jadwal_pendaftaran_admin');
                        Route::post('/jadwal-pendaftaran/update', [App\Http\Controllers\MasterController::class, 'update_jadwal_pendaftaran'])->name('update_jadwal_pendaftaran');
                        Route::get('/booklet-pendaftaran', [App\Http\Controllers\MasterController::class, 'booklet_pendaftaran'])->name('booklet_pendaftaran_admin');
                        Route::post('/booklet-pendaftaran/update', [App\Http\Controllers\MasterController::class, 'update_booklet'])->name('update_booklet');
                        Route::get('/alur-pendaftaran', [App\Http\Controllers\MasterController::class, 'alur_pendaftaran'])->name('alur_pendaftaran_admin');
                        Route::post('/alur-pendaftaran/update', [App\Http\Controllers\MasterController::class, 'update_alur_pendaftaran'])->name('update_alur_pendaftaran');
                        Route::get('/soal-test', [App\Http\Controllers\MasterController::class, 'soal_test'])->name('soal_test');
                        Route::post('/soal-test/update', [App\Http\Controllers\MasterController::class, 'update_soal_test'])->name('update_soal_test');
                    }
                );
            }
        );
    }
);
