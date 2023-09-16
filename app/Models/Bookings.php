<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookings extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'id',
        'booking_date_from',
        'booking_date_to',
        'customer_id ',
        'package_id',
        'number_of_people',
        'status',
    ];
}
