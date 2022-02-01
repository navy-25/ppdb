<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryPersyaratan extends Model
{
    use HasFactory;
    protected $table = 'category_persyaratans';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
    ];
}
