<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalonPesertasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calon_pesertas', function (Blueprint $table) {
            $table->id();
            $table->string('id_siswa');
            $table->string('no_peserta'); //undangan / regular
            $table->string('no_pendaftaran'); //undangan / regular
            $table->string('jalur'); //undangan / regular
            $table->string('jurusan'); //Agama / mipa  ips
            $table->string('status'); // calon pendfatar / menunggu hasil test / lolos / tidak lolos
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
        Schema::dropIfExists('calon_pesertas');
    }
}
