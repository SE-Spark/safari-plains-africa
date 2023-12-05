<?php

namespace App\Models;

use App\Livewire\BookingItems;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\LaravelPackageTools\Package;

class Bookings extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'id',
        'booking_date_from',
        'booking_date_to',
        'customer_id',
        'package_id',
        'booking_item_id',
        'number_of_people',
        'status',
    ];
    
    public function user(){
        return $this->belongsTo(User::class,'customer_id','id');
    }
    public function package(){
        return $this->hasOne(Packages::class,'id','package_id');
    }
    public function bookItem(){
        return $this->hasOne(Booking_Items::class,'id','booking_item_id');
    }
}
