<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Packages extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'id',
        'name',
        'image_urls',
        'summary',
        'description',
        'price',
        'number_of_people',
        'number_of_days',
        'group_id',
        'start_date',
        'end_date',
        'status',
        'tag',
        'iternary_details', // Add this line
        'haves_and_not_haves', // Add this line
        'trip_highlights', // Add this line
        'dest_days', // Add this line
    ];
    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];
    
    public function bookingItems()
    {
        return $this->belongsToMany(Booking_Items::class, 'package_booking_item', 'package_id', 'booking_item_id');
    }
    
    public function destinations()
    {
        return $this->belongsToMany(Destinations::class, 'package_destination', 'package_id', 'destination_id');
    }
    public function getPackageLifeTimeInDaysAttribute()
    {
        return $this->start_date->diffInDays($this->end_date);
    }
    public function groups()
    {
        return $this->belongsTo(Group::class,'group_id');
    }
}
