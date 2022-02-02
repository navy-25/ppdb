<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booklet extends Model
{
    use HasFactory;
    protected $table = 'booklets';
    protected $primaryKey = 'id';
    protected $fillable = [
        'file',
    ];
}
