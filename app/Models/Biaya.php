<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biaya extends Model
{
    use HasFactory;
    protected $table = 'biayas';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'id_category',
        'total',
    ];
}
