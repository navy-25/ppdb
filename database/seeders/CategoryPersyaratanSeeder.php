<?php

namespace Database\Seeders;

use App\Models\CategoryPersyaratan;
use Illuminate\Database\Seeder;

class CategoryPersyaratanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CategoryPersyaratan::create(['name' => 'Persyaratan Umum']);
        CategoryPersyaratan::create(['name' => 'Persyaratan Khusus Jalur Undangan']);
        CategoryPersyaratan::create(['name' => 'Persyaratan Khusus Jalur Reguler']);
        CategoryPersyaratan::create(['name' => 'Tempat dan Waktu Pendaftaran']);
        CategoryPersyaratan::create(['name' => 'Daftar Ulang']);
        CategoryPersyaratan::create(['name' => 'Hal-Hal lain']);
    }
}
