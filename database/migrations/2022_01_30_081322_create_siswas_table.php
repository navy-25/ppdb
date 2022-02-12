<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
            //Identitas diri
            $table->string('piagam')->nullable();
            $table->string('ijazah')->nullable();
            $table->string('photo')->nullable();
            $table->string('nama_lengkap')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->string('tanggal_lahir')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->string('nisn')->unique();
            $table->string('nis')->nullable();
            $table->string('email')->nullable();
            $table->string('telepon')->nullable();
            $table->string('hobi')->nullable();
            $table->string('cita_cita')->nullable();
            $table->string('jumlah_saudara')->nullable();
            $table->string('anak_ke')->nullable();
            $table->string('asal_sekolah')->nullable();
            $table->string('npsn_asal_sekolah')->nullable();
            $table->string('jenis_sekolah')->nullable();
            $table->string('status_sekolah')->nullable();
            $table->string('mengikuti_paud')->nullable();
            $table->string('mengikuti_tk')->nullable();

            //Informasi tempat tinggal
            $table->text('alamat')->nullable();
            $table->string('desa_kelurahan')->nullable();
            $table->string('kodepos')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('kab_kota')->nullable();
            $table->string('provinsi')->nullable();
            $table->string('jarak_tempat_tinggal')->nullable();
            $table->string('transportasi')->nullable();

            //program indonesia pinter/BSM
            $table->text('status_penerimaan_pip_bsm')->nullable();
            $table->text('alasan_menerima_pip_bsm')->nullable();
            $table->text('periode_menerima_pip_bsm')->nullable();

            //prestasi tertinggi yang pernah diraih
            $table->string('bidang_prestasi')->nullable();
            $table->string('tingkat_prestasi')->nullable();
            $table->string('peringkat')->nullable();
            $table->string('tahun')->nullable();

            //beasiswa
            $table->string('status_beasiswa')->nullable();
            $table->string('sumber_beasiswa')->nullable();
            $table->string('jenis_beasiswa')->nullable();
            $table->string('jangka_waktu')->nullable();
            $table->bigInteger('besaran_uang')->nullable();

            //orang tua
            $table->string('no_kk')->nullable();
            $table->string('nama_ayah')->nullable();
            $table->string('nik_ayah')->nullable();
            $table->string('pendidikan_terakhir_ayah')->nullable();
            $table->string('telepon_ayah')->nullable();
            $table->string('pekerjaan_ayah')->nullable();
            $table->string('nama_ibu')->nullable();
            $table->string('nik_ibu')->nullable();
            $table->string('pendidikan_terakhir_ibu')->nullable();
            $table->string('telepon_ibu')->nullable();
            $table->string('pekerjaan_ibu')->nullable();

            $table->bigInteger('penghasilan_perbulan')->nullable();
            $table->string('nomor_kss_kps')->nullable();
            $table->string('nomor_pkh')->nullable();
            $table->string('nomor_kip')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('siswas');
    }
}
