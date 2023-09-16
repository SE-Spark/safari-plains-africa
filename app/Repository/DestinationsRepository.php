<?php

namespace App\Repository;
use App\Models\Destinations;

class DestinationsRepository extends GenericRepository
{
    public function __construct(Destinations $destinations)
    {
        parent::__construct($destinations);
    }
}