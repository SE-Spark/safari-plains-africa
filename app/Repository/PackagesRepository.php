<?php

namespace App\Repository;

use App\Models\Packages;

class PackagesRepository extends GenericRepository
{
    public function __construct(Packages $packages)
    {
        parent::__construct($packages);
    }

    public function createWithDestinations($data, $destinationIds)
    {
        $package = $this->create($data);
        $package->destinations()->attach($destinationIds);
        return $package;
    }
    public function updateWithDestinations($id, $data, $destinationIds)
    {
        $package = $this->update($id, $data);
        $package->destinations()->sync($destinationIds);
        return $package;
    }
    public function getFilteredPackages($countryName = null, $destinationName = null)
    {
        $query = $this->model->where('status', 1); // Starting query
        
        // Filter by destination name (assuming many-to-many relationship)
        if ($destinationName) {
            $query->whereHas('destinations', function ($q) use ($destinationName) {
                $q->where('name', $destinationName);
            });
        }
        // Filter by country name (assuming country relationship exists)
        else if ($countryName) {
            $query->whereHas('destinations', function ($q) use ($countryName) {
                $q->whereHas('country', function ($subq) use ($countryName) {
                    $subq->where('name', $countryName);
                });
            });
        }

        return $query->get();
    }
}
