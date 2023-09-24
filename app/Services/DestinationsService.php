<?php

namespace App\Services;

use App\Interfaces\IService;
use App\Repository\DestinationsRepository;

class DestinationsService
{
    protected $destinationsRepository;

    public function __construct(DestinationsRepository $destinationsRepository)
    {
        $this->destinationsRepository = $destinationsRepository;
    }

    public function getAllDestinations()
    {
        return $this->destinationsRepository->getAll();
    }

    public function createDestination($newdestination)
    {
        return $this->destinationsRepository->create($newdestination);
    }

    public function updateDestination($destinationId, $updatedData)
    {
        return $this->destinationsRepository->update($destinationId, $updatedData);
    }
    
    public function deleteDestination($destinationId)
    {
        return $this->destinationsRepository->delete($destinationId);
    }
}
