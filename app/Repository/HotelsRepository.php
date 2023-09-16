<?php

namespace App\Repository;
use App\Models\Hotels;

class HotelsRepository extends GenericRepository
{
    public function __construct(Hotels $hotels)
    {
        parent::__construct($hotels);
    }
}