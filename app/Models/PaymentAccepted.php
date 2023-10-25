<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentAccepted extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'course_name',
        'payment_id',
        'fee'
    ];
}
