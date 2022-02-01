<?php

namespace Database\Seeders;

use App\Models\Biaya;
use Illuminate\Database\Seeder;

class BiayaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // infaq
        Biaya::create([
            'name' => 'Titipan infaq komite bulan juli 2021',
            'id_category' => 3,
            'total' => 90000,
        ]);
        Biaya::create([
            'name' => 'Titipan infaq dana fisik untuk pembangunan lokal baru/tambahan',
            'id_category' => 3,
            'total' => 10000,
        ]);
        // putra
        Biaya::create(['name' => 'Ikat pinggang', 'id_category' => 1, 'total' => 45000]);
        Biaya::create(['name' => 'Atribut seragam sekolah', 'id_category' => 1, 'total' => 60000]);
        Biaya::create(['name' => 'Baju olahraga 1 stel', 'id_category' => 1, 'total' => 125000]);
        Biaya::create(['name' => 'Dasi pelajar', 'id_category' => 1, 'total' => 15000]);
        Biaya::create(['name' => 'Nama siswa', 'id_category' => 1, 'total' => 15000]);
        Biaya::create(['name' => 'Kain batik', 'id_category' => 1, 'total' => 94000]);
        Biaya::create(['name' => 'Atribut seragam pramuka', 'id_category' => 1, 'total' => 80000]);
        Biaya::create(['name' => 'Kaos kaki', 'id_category' => 1, 'total' => 20000]);
        Biaya::create(['name' => 'Konsumsi MATSAMA 3 hari (Makan siang)', 'id_category' => 1, 'total' => 45000]);
        Biaya::create(['name' => 'Materai 6000 untuk surat pernyataan', 'id_category' => 1, 'total' => 6000]);
        Biaya::create(['name' => 'Tumbler (Botol minum) + Tas bekal', 'id_category' => 1, 'total' => 35000]);

        // putri
        Biaya::create(['name' => 'Jilbab putih', 'id_category' => 2, 'total' => 65000]);
        Biaya::create(['name' => 'Jilbab pramuka', 'id_category' => 2, 'total' => 65000]);

        Biaya::create(['name' => 'Badge Madrasah 2 set dan badge pramuka 1 set', 'id_category' => 2, 'total' => 60000]);
        Biaya::create(['name' => 'Baju olahraga 1 stel', 'id_category' => 2, 'total' => 125000]);
        Biaya::create(['name' => 'Dasi pelajar', 'id_category' => 2, 'total' => 15000]);
        Biaya::create(['name' => 'Nama siswa', 'id_category' => 2, 'total' => 15000]);

        Biaya::create(['name' => 'Kain batik', 'id_category' => 2, 'total' => 94000]);
        Biaya::create(['name' => 'Kacu pramuka, talikur dan topi boni', 'id_category' => 2, 'total' => 80000]);

        Biaya::create(['name' => 'Kaos kaki', 'id_category' => 2, 'total' => 20000]);
        Biaya::create(['name' => 'Konsumsi MATSAMA 3 hari (Makan siang)', 'id_category' => 2, 'total' => 45000]);
        Biaya::create(['name' => 'Materai 6000 untuk surat pernyataan', 'id_category' => 2, 'total' => 6000]);
        Biaya::create(['name' => 'Tumbler (Botol minum) + Tas bekal', 'id_category' => 2, 'total' => 35000]);
    }
}
