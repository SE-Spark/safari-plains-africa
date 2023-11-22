<?php

namespace App\Livewire;

use App\Helpers\HP;
use App\Repository\BookingItemsRepository;
use App\Repository\BookingRepository;
use App\Repository\PackagesRepository;
use App\Repository\UserRepository;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class Bookings extends Component
{
    public $modalTitle = 'Create Booking';
    public $booking_date_from, $booking_date_to, $customer_id, $package_id, $booking_item_id,$number_of_people, $status;
    public $packages,$items,$customers,$deleteId, $selectedId;
    protected $rules = [
        'booking_date_from' => 'required',
        'booking_date_to' => 'required',
        'customer_id' => 'required',
        'package_id' => 'required',
        'booking_item_id' => 'required',
        'number_of_people' => 'required',
        'status' => 'required',
    ];
    public function mount(PackagesRepository $packageService,BookingItemsRepository $bookingService,UserRepository $userService)
    {
        $this->packages = $packageService->getAll();
        $this->items = $bookingService->getAll();
        $this->customers = $userService->getAll();
    }
    public function render()
    {
        return view('admin.bookings.index');
    }
    
    #[On('editBooking')]
    public function editDestination(BookingRepository $bookingService, $rowId)
    {
        $this->modalTitle = 'Edit Booking';
        $this->selectedId = $rowId;
        $hotel = $bookingService->get()->where('id', $rowId)->first();
        $this->booking_date_from = $hotel->booking_date_from;
        $this->booking_date_to = $hotel->booking_date_to;
        $this->customer_id = $hotel->customer_id;
        $this->package_id = $hotel->package_id;
        $this->booking_item_id = $hotel->booking_item_id;
        $this->number_of_people = $hotel->number_of_people;
        $this->status = $hotel->status;
        $this->js("$('#createUpdateModal').modal('show')");
    }

    public function createUpdate(BookingRepository $bookingService)
    {
        $data = $this->validate();
        Log::info($data);
        try {
            if (!empty($this->selectedId)) {
                $bookingService->update($this->selectedId, $data);
                HP::setUnitUpdatedSuccessFlash();
            } else {
                $bookingService->create($data);
                HP::setUnitAddedSuccessFlash();
            }
            $this->cancel();
            $this->js("$('#createUpdateModal').modal('hide');");
            $this->dispatch('pg:eventRefresh-default');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            HP::setUnitAddedErrorFlash();
        }
    }
    public function delete(BookingRepository $bookingService)
    {
        $bookingService->delete($this->deleteId);
        HP::setUnitDeletedSuccessFlash();
        $this->dispatch('pg:eventRefresh-default');
    }
    #[On('deleteBooking')]
    public function deleteDestination(BookingRepository $bookingService, $rowId)
    {
        if ($bookingService->get()->where('id', $rowId)->first()) {
            $this->deleteId = $rowId;
            $this->js("$('#deleteModal').modal('show');");
        }
    }
    public function cancel()
    {
        $this->resetExcept(['packages','items','customers']);
        $this->resetValidation();
    }
}
