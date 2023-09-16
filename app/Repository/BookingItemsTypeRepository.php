<?php

namespace App\Repository;
use App\Models\Booking_Items_Type;

class BookingItemsTypeRepository extends GenericRepository
{
    public function __construct(Booking_Items_Type $booking_Items_Type)
    {
        parent::__construct($booking_Items_Type);
    }
}