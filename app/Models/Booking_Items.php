<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking_Items extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'booking_id',
        'item_type',
        'quantity',
    ];
}
