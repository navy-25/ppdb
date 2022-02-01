<?php

namespace Database\Seeders;

use App\Models\CategoryBiaya;
use Illuminate\Database\Seeder;

class CategoryBiayaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CategoryBiaya::create(['name' => 'Putra']);
        CategoryBiaya::create(['name' => 'Putri']);
        CategoryBiaya::create(['name' => 'Infaq']);
    }
}
