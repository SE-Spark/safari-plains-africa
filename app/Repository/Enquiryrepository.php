<?php

namespace App\Repository;
use App\Models\Enquiry;

class EnquiryRepository extends GenericRepository
{
    public function __construct(Enquiry $enquiry)
    {
        parent::__construct($enquiry);
    }
}