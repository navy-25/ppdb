<?php

namespace Database\Seeders;

use App\Models\AlurPendaftaran;
use App\Models\Booklet;
use App\Models\CalonPeserta;
use App\Models\CategoryPersyaratan;
use App\Models\Jadwal;
use App\Models\SoalTest;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(SiswaSeeder::class);
        $this->call(CalonPesertaSeeder::class);
        $this->call(CategoryPersyaratanSeeder::class);
        $this->call(PersyaratanSeeder::class);
        $this->call(CategoryBiayaSeeder::class);
        $this->call(BiayaSeeder::class);

        Jadwal::create(['file' => 'jadwal_pendaftaran.png']);
        AlurPendaftaran::create(['file' => 'alur_pendaftaran.png']);
        Booklet::create(['file' => 'booklet.pdf']);
        SoalTest::create(['file' => 'soal_test_regular.pdf']);
    }
}
