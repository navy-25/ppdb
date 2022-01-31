<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalonPeserta extends Model
{
    use HasFactory;
    protected $table = 'calon_pesertas';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_siswa',
        'jalur',
        'no_peserta',
        'no_pendaftaran',
        'jurusan',
        'status',
    ];
}
