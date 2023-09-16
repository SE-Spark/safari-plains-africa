<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'booking_id ',
        'payment_date',
        'payment_amount',
        'payment_method',
    ];
}
