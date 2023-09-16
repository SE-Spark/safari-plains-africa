<?php

namespace App\Repository;
use App\Models\Packages;

class PackagesRepository extends GenericRepository
{
    public function __construct(Packages $packages)
    {
        parent::__construct($packages);
    }
}