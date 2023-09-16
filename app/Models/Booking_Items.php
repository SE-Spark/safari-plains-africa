<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking_Items extends Model
{
    use HasFactory;
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
}
