<?php

namespace Database\Seeders;

use App\Models\Siswa;
use Illuminate\Database\Seeder;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        date_default_timezone_set('Asia/Jakarta');
        Siswa::create([
            'photo' => '1_1_Yoyon Hermawan.jpg',
            'nama_lengkap' => 'Yoyon Hermawan',
            'tempat_lahir' => 'Jombang',
            'tanggal_lahir' => '1999-01-25',
            'jenis_kelamin' => 'L',
            'nisn' => 1532485689,
            'nis' => 1231456412345621,
            'email' => 'yoyon123@gmail.com',
            'telepon' => '082165451234',
            'hobi' => 'Kesenian',
            'cita_cita' => 'Seniman',
            'jumlah_saudara' => 3,
            'anak_ke' => 1,
            'asal_sekolah' => 'Mts Ar Roudlotul Ilmiyah',
            'npsn_asal_sekolah' => 56482315,
            'jenis_sekolah' => 'Mts',
            'status_sekolah' => 'Swasta',
            'mengikuti_paud' => 'Pernah',
            'mengikuti_tk' => 'Pernah',
            'alamat' => 'Dsn. Bandar, Rt. 01, Rw. 04, no. 56',
            'desa_kelurahan' => 'Bandar',
            'kodepos' => 61583,
            'kecamatan' => 'Bandar Kedung Mulyo',
            'kab_kota' => 'Jombang',
            'provinsi' => 'Jawa Timur',
            'jarak_tempat_tinggal' => '5-10 Km',
            'transportasi' => 'Motor',
            'status_penerimaan_pip_bsm' => "Aktiv",
            'alasan_menerima_pip_bsm' => 'Ranking 1 selama 3 tahun',
            'periode_menerima_pip_bsm' => '2021',
            'bidang_prestasi' => 'Design Graphic',
            'tingkat_prestasi' => 'Regional',
            'peringkat' => '2',
            'tahun' => '2021',
            'status_beasiswa' => 'Aktiv',
            'sumber_beasiswa' => 'Dinas Pendidikan',
            'jenis_beasiswa' => 'Beasiswa Anak Cerdas',
            'jangka_waktu' => 6,
            'besaran_uang' => 2500000,
            'no_kk' => 3124564756423564,
            'nama_ayah' => 'Suyitno',
            'nik_ayah' => 3514235685464567,
            'pendidikan_terakhir_ayah' => 'S1',
            'telepon_ayah' => '0821987564552',
            'pekerjaan_ayah' => 'Designer graphic',
            'nama_ibu' => 'Indriyani',
            'nik_ibu' => '35127456785213521',
            'pendidikan_terakhir_ibu' => 'D3',
            'telepon_ibu' => '082132524567',
            'pekerjaan_ibu' => 'Guru',
            'penghasilan_perbulan' => 6500000,
            'nomor_kss_kps' => 6548321,
            'nomor_pkh' => 6875465,
            'nomor_kip' => 67912315,
        ]);
        Siswa::create([
            'photo' =>  null,
            'nama_lengkap' => 'Deni Kurniawan',
            'tempat_lahir' => 'Jombang',
            'tanggal_lahir' => '1999-01-25',
            'jenis_kelamin' => 'L',
            'nisn' => 85216654825,
            'nis' => 123556428521,
            'email' => 'deni123@gmail.com',
            'telepon' => '082165451234',
            'hobi' => 'Kesenian',
            'cita_cita' => 'Seniman',
            'jumlah_saudara' => 3,
            'anak_ke' => 1,
            'asal_sekolah' => 'Mts Ar Roudlotul Ilmiyah',
            'npsn_asal_sekolah' => 45612564,
            'jenis_sekolah' => 'Mts',
            'status_sekolah' => 'Swasta',
            'mengikuti_paud' => 'Pernah',
            'mengikuti_tk' => 'Pernah',
            'alamat' => 'Dsn. Bandar, Rt. 01, Rw. 04, no. 56',
            'desa_kelurahan' => 'Bandar',
            'kodepos' => 61583,
            'kecamatan' => 'Bandar Kedung Mulyo',
            'kab_kota' => 'Jombang',
            'provinsi' => 'Jawa Timur',
            'jarak_tempat_tinggal' => '5-10 Km',
            'transportasi' => 'Motor',
            'status_penerimaan_pip_bsm' => "Aktiv",
            'alasan_menerima_pip_bsm' => 'Ranking 1 selama 3 tahun',
            'periode_menerima_pip_bsm' => '2021',
            'bidang_prestasi' => 'Design Graphic',
            'tingkat_prestasi' => 'Regional',
            'peringkat' => '2',
            'tahun' => '2021',
            'status_beasiswa' => 'Aktiv',
            'sumber_beasiswa' => 'Dinas Pendidikan',
            'jenis_beasiswa' => 'Beasiswa Anak Cerdas',
            'jangka_waktu' => 6,
            'besaran_uang' => 2500000,
            'no_kk' => 3124564756423564,
            'nama_ayah' => 'Suyitno',
            'nik_ayah' => 3514235685464567,
            'pendidikan_terakhir_ayah' => 'S1',
            'telepon_ayah' => '0821987564552',
            'pekerjaan_ayah' => 'Designer graphic',
            'nama_ibu' => 'Indriyani',
            'nik_ibu' => '35127456785213521',
            'pendidikan_terakhir_ibu' => 'D3',
            'telepon_ibu' => '082132524567',
            'pekerjaan_ibu' => 'Guru',
            'penghasilan_perbulan' => 6500000,
            'nomor_kss_kps' => 6548321,
            'nomor_pkh' => 6875465,
            'nomor_kip' => 67912315,
        ]);
        Siswa::create([
            'photo' => null,
            'nama_lengkap' => 'Dewi Agfiannisa',
            'tempat_lahir' => 'Blitar',
            'tanggal_lahir' => '1999-01-05',
            'jenis_kelamin' => 'P',
            'nisn' => 8521456789,
            'nis' => 9854561234564852,
            'email' => 'dewi123@gmail.com',
            'telepon' => '082165451234',
            'hobi' => 'Kesenian',
            'cita_cita' => 'Seniman',
            'jumlah_saudara' => 3,
            'anak_ke' => 1,
            'asal_sekolah' => 'Mts Ar Roudlotul Ilmiyah',
            'npsn_asal_sekolah' => 78901234,
            'jenis_sekolah' => 'Mts',
            'status_sekolah' => 'Swasta',
            'mengikuti_paud' => 'Pernah',
            'mengikuti_tk' => 'Pernah',
            'alamat' => 'Dsn. Bandar, Rt. 01, Rw. 04, no. 56',
            'desa_kelurahan' => 'Bandar',
            'kodepos' => 61583,
            'kecamatan' => 'Bandar Kedung Mulyo',
            'kab_kota' => 'Jombang',
            'provinsi' => 'Jawa Timur',
            'jarak_tempat_tinggal' => '5-10 Km',
            'transportasi' => 'Motor',
            'status_penerimaan_pip_bsm' => "Aktiv",
            'alasan_menerima_pip_bsm' => 'Ranking 1 selama 3 tahun',
            'periode_menerima_pip_bsm' => '2021',
            'bidang_prestasi' => 'Design Graphic',
            'tingkat_prestasi' => 'Regional',
            'peringkat' => '2',
            'tahun' => '2021',
            'status_beasiswa' => 'Aktiv',
            'sumber_beasiswa' => 'Dinas Pendidikan',
            'jenis_beasiswa' => 'Beasiswa Anak Cerdas',
            'jangka_waktu' => 6,
            'besaran_uang' => 2500000,
            'no_kk' => 3124564756423564,
            'nama_ayah' => 'Suyitno',
            'nik_ayah' => 3514235685464567,
            'pendidikan_terakhir_ayah' => 'S1',
            'telepon_ayah' => '0821987564552',
            'pekerjaan_ayah' => 'Designer graphic',
            'nama_ibu' => 'Indriyani',
            'nik_ibu' => '35127456785213521',
            'pendidikan_terakhir_ibu' => 'D3',
            'telepon_ibu' => '082132524567',
            'pekerjaan_ibu' => 'Guru',
            'penghasilan_perbulan' => 6500000,
            'nomor_kss_kps' => 6548321,
            'nomor_pkh' => 6875465,
            'nomor_kip' => 67912315,
        ]);
    }
}