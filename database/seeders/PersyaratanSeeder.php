<?php

namespace Database\Seeders;

use App\Models\Persyaratan;
use Illuminate\Database\Seeder;

class PersyaratanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Persyaratan umum
        Persyaratan::create([
            'name' => 'Beragama islam',
            'number' => 1,
            'id_category' => 1,
            'sub_persyaratan' => '',
        ]);
        Persyaratan::create([
            'name' => 'Umur tidak tidak lebih dari 21 tahun pada saat mendaftarkan diri',
            'number' => 2,
            'id_category' => 1,
            'sub_persyaratan' => '',
        ]);
        Persyaratan::create([
            'name' => 'Memiliki ijazah/STTB/SKHU dan Raport MTs/sederajat',
            'number' => 3,
            'id_category' => 1,
            'sub_persyaratan' => '',
        ]);
        // Persyaratan undangan
        Persyaratan::create([
            'name' => 'Jalur undangan adalah jalur khusus penerimaan calon peserta didik baru yang direkomendasikan oleh Madrasah berdasarkan surat edaran dari MAN 1 Hulu Sungai Tengah',
            'number' => 1,
            'id_category' => 2,
            'sub_persyaratan' => '',
        ]);
        Persyaratan::create([
            'name' => 'Calon peserta didik baru didaftarkan secara kolektif oleh Madrasah atau sekolah dengan format yang terlampir',
            'number' => 2,
            'id_category' => 2,
            'sub_persyaratan' => '',
        ]);
        Persyaratan::create([
            'name' => 'Kuota jalur undangan disesuaikan dengan jumlah formasi yang ditentukan oleh panitia PPDB 2021',
            'number' => 3,
            'id_category' => 2,
            'sub_persyaratan' => '',
        ]);
        Persyaratan::create([
            'name' => 'Calon peserta didik baru melalui jalur undangan yang direkomendasikan oleh Madrasah/sekolah harus memenuhi kriteria sebagai berikut:',
            'number' => 3,
            'id_category' => 2,
            'sub_persyaratan' => '',
        ]);
        Persyaratan::create([
            'name' => 'Pilihan peminatan IPA, rata rata nilai mata pelajaran IPA dan Matemarika dari semester 1 sampai 5 minimal 81,00 atau rata rata nilainya 80,00 dengan syarat berprestasi dalam lomba Juara (1,2,3) tingkat propinsi atau mewakili sebagai peserta tingkat nasonal dalam cabang lomba (Foto copy bukti dilampirkan)',
            'number' => 1,
            'id_category' => 2,
            'sub_persyaratan' => 7,
        ]);
        Persyaratan::create([
            'name' => 'Pemilihan peminatan IPS, rata rata nilai mata pelajaran IPS dan Matematika dari semester 1 sampai 5 minimal 81,00 atay rata rata nilainya 80,00 dengan syarat berprestasi dalam lomba juara (1,2,3) tingkat propinsi atau mewakili sebagai peserta tingkat nasional dalam cabang lomba (Foto copy bukti dilampirkan)',
            'number' => 2,
            'id_category' => 2,
            'sub_persyaratan' => 7,
        ]);
        Persyaratan::create([
            'name' => 'Pemilihan peminatan IIK (Ilmu ilmu keagamaan), rata rata nilai mata pelajaran PAI (Aqidah-Akhlaq, Qur an Hadits, Fiqih, SKI) dari semester 1 sampai 5 minimal 81,00 atay rata rata nilainya 80,00 dengan syarat berprestasi dalam lomba juara (1,2,3) tingkat propinsi atau mewakili sebagai peserta tingkat nasional dalam cabang lomba (Foto copy bukti dilampirkan)',
            'number' => 3,
            'id_category' => 2,
            'sub_persyaratan' => 7,
        ]);
        Persyaratan::create([
            'name' => 'Melampirkan fotocopy nilai raport semester I,II,III,IV,V sebanyak 1 rangkap yang telah dilegalisir setiap calon peserta didik baru yang direkomendasikan oleh pihak Madrasah',
            'number' => 3,
            'id_category' => 2,
            'sub_persyaratan' => 7,
        ]);
        Persyaratan::create([
            'name' => 'Melampirkan fotocopy kartu keluarga sebanyak 1 lembar (yang ada NIK nya) dan Akta Kelahiran',
            'number' => 4,
            'id_category' => 2,
            'sub_persyaratan' => '',
        ]);
        Persyaratan::create([
            'name' => 'Melampirkan pas photo ukuran 3x4 sebanyak 2 lembar yang disetempel dii formulir pendaftaran',
            'number' => 5,
            'id_category' => 2,
            'sub_persyaratan' => '',
        ]);
        Persyaratan::create([
            'name' => 'Semua persyaratan peserta jalur undangan dimasukkan ke dalam satu berkas',
            'number' => 6,
            'id_category' => 2,
            'sub_persyaratan' => '',
        ]);
        Persyaratan::create([
            'name' => 'Semua persyaratan dimasukkan kedalam MAP : Warna hijau program IIK, Kuning program IPA, Merah program IPS',
            'number' => 7,
            'id_category' => 2,
            'sub_persyaratan' => '',
        ]);
        Persyaratan::create([
            'name' => 'Bagi calon peserta seleksi yang berprestasi juara dalam bidang lomba kejuaraan harus memperlihatkan piagam aslinya',
            'number' => 8,
            'id_category' => 2,
            'sub_persyaratan' => '',
        ]);
        Persyaratan::create([
            'name' => 'Photocopi kartu peserta ujian nasional',
            'number' => 9,
            'id_category' => 2,
            'sub_persyaratan' => '',
        ]);

        // tempat dan waktu pendaftaran
        Persyaratan::create([
            'name' => 'Tempat MAN 1 Hulu Sungai TEngah',
            'number' => 1,
            'id_category' => 4,
            'sub_persyaratan' => '',
        ]);
        Persyaratan::create([
            'name' => 'Waktu pendaftaran di mulai pada hari Senin-Jumat, tanggal 1-5 maret 2021 / Penyerahan berkas jalur undangan pada hari Sabtu Tangal 6 maret 2021 secara kolektif dari pihak Madrasah kepada Panitia PPDB MAN 1 Hulu sungai tengah dalam amplop tertutup',
            'number' => 2,
            'id_category' => 4,
            'sub_persyaratan' => '',
        ]);
        Persyaratan::create([
            'name' => 'Pengumuman hasil jalur undangan pada hari selasa, 9 maret 2021',
            'number' => 3,
            'id_category' => 4,
            'sub_persyaratan' => '',
        ]);
        // daftar ulang
        Persyaratan::create([
            'name' => 'Daftal ulang / registrasi jalur undangan di mulai pada hari selasa - sabtu tanggal 9 s/d 13 maret 2021 dengan membawa surat rekomendasi yang telah diusulkan oleh pihak madrasah, dan dilakukan oleh orang tua / wali calon peserta didik baru',
            'number' => 1,
            'id_category' => 5,
            'sub_persyaratan' => '',
        ]);
        Persyaratan::create([
            'name' => 'Bagi peserta didik baru yang telah meregistrasi biaya atau uang regristasi tidak bisa diambil kembali jika mengundurkan diri',
            'number' => 2,
            'id_category' => 5,
            'sub_persyaratan' => '',
        ]);
        Persyaratan::create([
            'name' => 'Bagi peserta seleksi penerimaan peserta didik baru yang dinyatakan lulus namun tidak lulus pada Madrasah/Sekolah asal (MTs/SMP) maka dinyatakan gugur sebagai peserta didik di Madrasah Aliyah Negeri 1 Hulu Sungai Tengah',
            'number' => 3,
            'id_category' => 5,
            'sub_persyaratan' => '',
        ]);
        // lain lain
        Persyaratan::create([
            'name' => 'Format pengiriman data peserta jalur undangan terlampir yang dicontohkan panitia PPDB',
            'number' => 1,
            'id_category' => 6,
            'sub_persyaratan' => '',
        ]);
        Persyaratan::create([
            'name' => 'Hal-hal lain yang belum jelas dapat ditanyakan pada panitia penerimaan peserta didik baru',
            'number' => 2,
            'id_category' => 6,
            'sub_persyaratan' => '',
        ]);
        Persyaratan::create([
            'name' => 'Biaya registrasi akan ditentukan oleh panitia setelah pengumuman kelulusan',
            'number' => 3,
            'id_category' => 6,
            'sub_persyaratan' => '',
        ]);
    }
}
