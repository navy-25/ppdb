<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalTest extends Model
{
    use HasFactory;
    protected $table = 'jadwal_tests';
    protected $primaryKey = 'id';
    protected $fillable = [
        'tanggal_mulai',
        'tanggal_selesai',
        'jam_mulai',
        'jam_selesai',
    ];
}
