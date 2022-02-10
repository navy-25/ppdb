<?php

namespace Database\Seeders;

use App\Models\CalonPeserta;
use Illuminate\Database\Seeder;

class CalonPesertaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CalonPeserta::create([
            'id_siswa' => 1,
            'jalur' => 'Regular',
            'no_peserta' => 'MAN1-00001',
            'no_pendaftaran' => 'REG-00001',
            'jurusan' => 'Agama',
            'status' => 'Calon Pendaftar',
        ]);
        CalonPeserta::create([
            'id_siswa' => 2,
            'jalur' => 'Regular',
            'no_peserta' => 'MAN1-00002',
            'no_pendaftaran' => 'REG-00002',
            'jurusan' => 'Agama',
            'status' => 'Lulus',
        ]);
        CalonPeserta::create([
            'id_siswa' => 3,
            'jalur' => 'Regular',
            'no_peserta' => 'MAN1-00003',
            'no_pendaftaran' => 'REG-00003',
            'jurusan' => 'IPS',
            'status' => 'Tidak Lulus',
        ]);
    }
}
