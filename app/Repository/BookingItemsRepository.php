<?php

namespace App\Repository;
use App\Models\Booking_Items;

class BookingItemsRepository extends GenericRepository
{
    public function __construct(Booking_Items $bookingItems)
    {
        parent::__construct($bookingItems);
    }
}