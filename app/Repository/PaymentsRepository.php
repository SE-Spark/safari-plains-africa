<?php

namespace App\Repository;
use App\Models\Payments;

class PaymentsRepository extends GenericRepository
{
    public function __construct(Payments $payments)
    {
        parent::__construct($payments);
    }
}