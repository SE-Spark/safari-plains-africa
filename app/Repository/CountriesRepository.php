<?php

namespace App\Repository;
use App\Models\Country;

class CountriesRepository extends GenericRepository
{
    public function __construct(Country $countries)
    {
        parent::__construct($countries);
    }
}