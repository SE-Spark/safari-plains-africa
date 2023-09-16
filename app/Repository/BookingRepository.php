<?php

namespace App\Repository;
use App\Models\Bookings;

class BookingRepository extends GenericRepository
{
    public function __construct(Bookings $bookings)
    {
        parent::__construct($bookings);
    }
}