<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlurPendaftaran extends Model
{
    use HasFactory;
    protected $table = 'alur_pendaftarans';
    protected $primaryKey = 'id';
    protected $fillable = [
        'file',
    ];
}
