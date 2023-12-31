<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PopularCourse extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'image',
        'description',
        'category_id',
        'time',
        'fee'
    ];
}
