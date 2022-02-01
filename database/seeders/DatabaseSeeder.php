<?php

namespace Database\Seeders;

use App\Models\CalonPeserta;
use App\Models\CategoryPersyaratan;
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
    }
}
