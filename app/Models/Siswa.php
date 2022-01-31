<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $table = 'siswas';
    protected $primaryKey = 'id';
    protected $fillable = [
        'photo',
        'nama_lengkap',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'nisn',
        'nis',
        'email',
        'telepon',
        'hobi',
        'cita_cita',
        'jumlah_saudara',
        'anak_ke',
        'asal_sekolah',
        'npsn_asal_sekolah',
        'jenis_sekolah',
        'status_sekolah',
        'mengikuti_paud',
        'mengikuti_tk',
        'alamat',
        'desa_kelurahan',
        'kodepos',
        'kecamatan',
        'kab_kota',
        'provinsi',
        'jarak_tempat_tinggal',
        'transportasi',
        'status_penerimaan_pip_bsm',
        'alasan_menerima_pip_bsm',
        'periode_menerima_pip_bsm',
        'bidang_prestasi',
        'tingkat_prestasi',
        'peringkat',
        'tahun',
        'status_beasiswa',
        'sumber_beasiswa',
        'jenis_beasiswa',
        'jangka_waktu',
        'besaran_uang',
        'no_kk',
        'nama_ayah',
        'nik_ayah',
        'pendidikan_terakhir_ayah',
        'telepon_ayah',
        'pekerjaan_ibu',
        'nama_ibu',
        'nik_ibu',
        'pendidikan_terakhir_ibu',
        'telepon_ibu',
        'pekerjaan_ibu',
        'penghasilan_perbulan',
        'nomor_kss_kps',
        'nomor_pkh',
        'nomor_kip',
    ];
}
