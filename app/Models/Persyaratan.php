<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persyaratan extends Model
{
    use HasFactory;
    protected $table = 'persyaratans';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'number',
        'sub_persyaratan',
        'id_category',
    ];
}
