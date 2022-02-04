<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoalTest extends Model
{
    use HasFactory;
    protected $table = 'soal_tests';
    protected $primaryKey = 'id';
    protected $fillable = [
        'file',
    ];
}
