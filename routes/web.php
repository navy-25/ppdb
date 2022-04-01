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

Route::get('/getPersyaratanAll', [App\Http\Controllers\HomeController::class, 'getPersyaratanAll'])->name('getPersyaratanAll');
Route::get('/', [App\Http\Controllers\LandingController::class, 'index'])->name('web_ppdb');

// Auth::routes();
// Auth::routes(['register' => false]);

Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'index'])->name('login.form');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'index'])->name('register.form');
Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('register');

Route::prefix('ppdb')->group(
    function () {
        Route::get('/syarat-pendaftaran', [App\Http\Controllers\LandingController::class, 'syarat_pendaftaran'])->name('syarat_pendaftaran');
        Route::get('/jadwal', [App\Http\Controllers\LandingController::class, 'jadwal'])->name('jadwal');
        Route::get('/biaya', [App\Http\Controllers\LandingController::class, 'biaya'])->name('biaya');
        Route::get('/daftar', [App\Http\Controllers\LandingController::class, 'daftar'])->name('daftar');
        Route::post('/daftar/store', [App\Http\Controllers\LandingController::class, 'form_pendaftaran_siswa'])->name('form_pendaftaran_siswa');
        Route::get('/alur-pendaftaran', [App\Http\Controllers\LandingController::class, 'alur_pendaftaran'])->name('alur_pendaftaran');
        Route::get('/cek-status-pendaftaran', [App\Http\Controllers\LandingController::class, 'cek_status_pendaftaran'])->name('cek_status_pendaftaran');
        Route::get('/print-kartu-peserta/{nama_lengkap}/{id}', [App\Http\Controllers\LandingController::class, 'print_kartu_peserta'])->name('print_kartu_peserta');
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
                Route::prefix('calon-pendaftar')->group(
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
                Route::prefix('hasil-seleksi')->group(
                    function () {
                        Route::get('/lulus', [App\Http\Controllers\PendaftarController::class, 'peserta_lolos'])->name('peserta_lolos');
                        Route::get('/lulus/getDataPesertaLolos', [App\Http\Controllers\PendaftarController::class, 'getDataPesertaLolos'])->name('getDataPesertaLolos');
                        Route::get('/reject', [App\Http\Controllers\PendaftarController::class, 'peserta_tidak_lolos'])->name('peserta_reject');
                        Route::get('/reject/getDataPesertaTidakLolos', [App\Http\Controllers\PendaftarController::class, 'getDataPesertaTidakLolos'])->name('getDataPesertaTidakLolos');
                    }
                );
                Route::prefix('seleksi')->group(
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
                Route::prefix('peserta-lolos')->group(
                    function () {
                        Route::get('/cetak-surat/', [App\Http\Controllers\PendaftarController::class, 'cetak_surat'])->name('cetak_surat');
                        Route::get('/cetak-surat/{id}/orang-tua-wali', [App\Http\Controllers\PendaftarController::class, 'print_sp_wali'])->name('print_sp_wali');
                        Route::get('/cetak-surat/{id}/calon-peserta-didik', [App\Http\Controllers\PendaftarController::class, 'print_sp_calon_peserta_didik'])->name('print_sp_calon_peserta_didik');
                        Route::get('/cetak-peserta/', [App\Http\Controllers\PendaftarController::class, 'peserta_lolos_print'])->name('peserta_lolos_print');
                        Route::get('/getDataPesertaLolosCetakSurat', [App\Http\Controllers\PendaftarController::class, 'getDataPesertaLolosCetakSurat'])->name('getDataPesertaLolosCetakSurat');
                    }
                );
                Route::prefix('akun')->group(
                    function () {
                        Route::get('/pegawai', [App\Http\Controllers\UsersController::class, 'index'])->name('akun_pegawai');
                        Route::post('/pegawai/store', [App\Http\Controllers\UsersController::class, 'store'])->name('store_akun_pegawai');
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

                        Route::get('/persyaratan-pendaftaran-umum', [App\Http\Controllers\MasterController::class, 'persyaratan_pendaftaran_umum'])->name('persyaratan_pendaftaran_umum');
                        Route::get('/persyaratan-pendaftaran-Undangan', [App\Http\Controllers\MasterController::class, 'persyaratan_pendaftaran_undangan'])->name('persyaratan_pendaftaran_undangan');
                        Route::get('/persyaratan-pendaftaran-Regular', [App\Http\Controllers\MasterController::class, 'persyaratan_pendaftaran_regular'])->name('persyaratan_pendaftaran_regular');
                        Route::get('/persyaratan-pendaftaran-tempat', [App\Http\Controllers\MasterController::class, 'persyaratan_pendaftaran_tempat'])->name('persyaratan_pendaftaran_tempat');
                        Route::get('/persyaratan-pendaftaran-daftar-ulang', [App\Http\Controllers\MasterController::class, 'persyaratan_pendaftaran_daftar_ulang'])->name('persyaratan_pendaftaran_daftar_ulang');
                        Route::get('/persyaratan-pendaftaran-lain-lain', [App\Http\Controllers\MasterController::class, 'persyaratan_pendaftaran_lain_lain'])->name('persyaratan_pendaftaran_lain_lain');
                        Route::get('/persyaratan-pendaftaran/{id}/delete-persyaratan-pendaftaran', [App\Http\Controllers\MasterController::class, 'delete_persyaratan_pendaftaran'])->name('delete_persyaratan_pendaftaran');
                        Route::get('/getDataPersyaratan/{category}', [App\Http\Controllers\MasterController::class, 'getDataPersyaratan'])->name('getDataPersyaratan');
                        Route::post('/biaya-pendaftaran/{id}/update-persyaratan-pendaftaran', [App\Http\Controllers\MasterController::class, 'update_persyaratan_pendaftaran'])->name('update_persyaratan_pendaftaran');
                        Route::post('/biaya-pendaftaran/{category}/store-persyaratan-pendaftaran', [App\Http\Controllers\MasterController::class, 'store_persyaratan_pendaftaran'])->name('store_persyaratan_pendaftaran');

                        Route::get('/biaya-infaq', [App\Http\Controllers\MasterController::class, 'biaya_infaq'])->name('biaya_infaq');
                        Route::get('/biaya-siswa', [App\Http\Controllers\MasterController::class, 'biaya_siswa'])->name('biaya_siswa');
                        Route::post('/biaya-pendaftaran/{id}/update-biaya-pendaftaran', [App\Http\Controllers\MasterController::class, 'update_biaya_pendaftaran'])->name('update_biaya_pendaftaran');
                        Route::post('/biaya-pendaftaran/{category}/store-biaya-pendaftaran', [App\Http\Controllers\MasterController::class, 'store_biaya_pendaftaran'])->name('store_biaya_pendaftaran');
                        Route::get('/biaya-pendaftaran/{id}/delete-biaya-pendaftaran', [App\Http\Controllers\MasterController::class, 'delete_biaya_pendaftaran'])->name('delete_biaya_pendaftaran');
                        Route::get('/getDataBiaya/{category}', [App\Http\Controllers\MasterController::class, 'getDataBiaya'])->name('getDataBiaya');

                        Route::get('/jadwal-test', [App\Http\Controllers\MasterController::class, 'jadwal_test'])->name('jadwal_test');
                        Route::post('/jadwal-test/set', [App\Http\Controllers\MasterController::class, 'jadwal_test_set'])->name('jadwal_test_set');
                    }
                );
            }
        );
    }
);
