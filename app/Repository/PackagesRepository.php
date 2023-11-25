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
        $package = $this->update($id,$data);
        $package->destinations()->sync($destinationIds);
        return $package;
    }
}
