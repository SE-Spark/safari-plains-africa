<?php

namespace App\Repository;
use App\Models\Testimonial;

class TestimonialRepository extends GenericRepository
{
    public function __construct(Testimonial $testimonial)
    {
        parent::__construct($testimonial);
    }
}