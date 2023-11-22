<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking_Items extends Model
{
    use HasFactory;
    protected $table = 'booking_items'; 
    protected $fillable = [
        'id',
        'booking_item_type_id',
        'title',
        'description',
        'img_url',
        'booking_date_from',
        'booking_date_to',
        'number_of_people',
        'status',
    ];

    public function category(){
        return $this->belongsTo(Booking_Items_Type::class,'booking_item_type_id','id');
    }
    public function packages()
    {
        return $this->belongsToMany(Packages::class, 'package_booking_item', 'booking_item_id', 'package_id');
    }
}
