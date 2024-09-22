<?php

namespace App\Repository;
use App\Models\Destinations;

class DestinationsRepository extends GenericRepository
{
    public function __construct(Destinations $destinations)
    {
        parent::__construct($destinations);
    }
    public function getFilteredDestinations($countryName = null)
    {
        $query = $this->model->where('status', 1);

        if ($countryName) {
            $query->whereHas('country', function ($q) use ($countryName) {
                $q->where('name', $countryName);
            });
            return $query->get(['id', 'name']);
        }
        return [];
    }
}