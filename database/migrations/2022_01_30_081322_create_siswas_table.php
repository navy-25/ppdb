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
            $table->string('photo')->nullable();
            $table->string('nama_lengkap');
            $table->string('tempat_lahir');
            $table->string('tanggal_lahir');
            $table->string('jenis_kelamin');
            $table->string('nisn')->unique();
            $table->string('nis')->unique();
            $table->string('email')->unique();
            $table->string('telepon');
            $table->string('hobi');
            $table->string('cita_cita');
            $table->integer('jumlah_saudara');
            $table->integer('anak_ke');
            $table->string('asal_sekolah');
            $table->integer('npsn_asal_sekolah');
            $table->string('jenis_sekolah');
            $table->string('status_sekolah');
            $table->string('mengikuti_paud');
            $table->string('mengikuti_tk');

            //Informasi tempat tinggal
            $table->text('alamat');
            $table->string('desa_kelurahan');
            $table->integer('kodepos');
            $table->string('kecamatan');
            $table->string('kab_kota');
            $table->string('provinsi');
            $table->string('jarak_tempat_tinggal');
            $table->string('transportasi');

            //program indonesia pinter/BSM
            $table->text('status_penerimaan_pip_bsm')->nullable();
            $table->text('alasan_menerima_pip_bsm')->nullable();
            $table->text('periode_menerima_pip_bsm')->nullable();

            //prestasi tertinggi yang pernah diraih
            $table->string('bidang_prestasi')->nullable();
            $table->string('tingkat_prestasi')->nullable();
            $table->string('peringkat')->nullable();
            $table->integer('tahun')->nullable();

            //beasiswa
            $table->string('status_beasiswa')->nullable();
            $table->string('sumber_beasiswa')->nullable();
            $table->string('jenis_beasiswa')->nullable();
            $table->integer('jangka_waktu')->nullable();
            $table->bigInteger('besaran_uang')->nullable();

            //orang tua
            $table->string('no_kk');
            $table->string('nama_ayah');
            $table->string('nik_ayah');
            $table->string('pendidikan_terakhir_ayah');
            $table->string('telepon_ayah');
            $table->string('pekerjaan_ayah');
            $table->string('nama_ibu');
            $table->string('nik_ibu');
            $table->string('pendidikan_terakhir_ibu');
            $table->string('telepon_ibu');
            $table->string('pekerjaan_ibu');

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
