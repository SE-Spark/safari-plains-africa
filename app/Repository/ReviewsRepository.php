<?php

namespace App\Repository;
use App\Models\Reviews;

class ReviewsRepository extends GenericRepository
{
    public function __construct(Reviews $reviews)
    {
        parent::__construct($reviews);
    }
}