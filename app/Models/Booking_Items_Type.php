<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking_Items_Type extends Model
{
    use HasFactory;
    protected $table = 'booking_items_type';    
    protected $fillable = [
        'id',
        'name',
        'description',
        'status',        
    ];
}
