<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Packages extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'id',
        'name',
        'description',
        'price',
        'number_of_people',
        'start_date',
        'end_date',
        'status',
    ];
    
    public function bookingItems()
    {
        return $this->belongsToMany(Booking_Items::class, 'package_booking_item', 'package_id', 'booking_item_id');
    }
    
    public function destinations()
    {
        return $this->belongsToMany(Destinations::class, 'package_destination', 'package_id', 'destination_id');
    }
}
