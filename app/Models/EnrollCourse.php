<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnrollCourse extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'course_name',
        'fee',
        'status'
    ];
}
