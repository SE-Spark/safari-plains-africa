<?php

namespace App\Livewire;

use App\Helpers\HP;
use App\Repository\BlogcategoryRepository;
use App\Repository\BlogpostRepository;
use App\Repository\DestinationsRepository;
use App\Repository\PackagesRepository;
use Illuminate\Support\Facades\File;
use Livewire\Component;

class CreatePackage extends Component
{
    public $modalTitle = "Create Package";
    public $name, $description, $price, $number_of_people, $number_of_days, $start_date, $end_date, $status, $destinationId, $destinations;
    public $deleteId, $selectedId;

    protected $rules = [
        'name' => 'required',
        'description' => 'required',
        'price' => 'required',
        'destinationId' => 'required',
        'number_of_people' => 'required',
        'number_of_days' => 'required',
        'start_date' => 'required',
        'end_date' => 'required',
        'status' => 'required',
    ];

    protected $messages = [
        'image_photo.required_without' => 'The image photo field is required.',
    ];

    public function mount(PackagesRepository $packageService, DestinationsRepository $destinationService, $selection = null)
    {
        $this->destinations = $destinationService->getAll();
        if ($selection) {
            $this->modalTitle = "Edit Package";
            $this->selectedId = $selection;
            $selectedPackage = $packageService->get()->where('id', $selection)->first();
            // dd($selectedPackage);
            $this->name = $selectedPackage->name;
            $this->description = $selectedPackage->description;
            $this->price = $selectedPackage->price;
            $this->destinationId = $selectedPackage->destinations[0]->id;
            $this->number_of_people = $selectedPackage->number_of_people;
            $this->number_of_days = $selectedPackage->number_of_days;
            $this->start_date =  \Carbon\Carbon::parse($selectedPackage->startdate)->format('Y-m-d');
            $this->end_date = \Carbon\Carbon::parse($selectedPackage->end_date)->format('Y-m-d');
            $this->status = $selectedPackage->status;
        }
    }

    public function render()
    {

        return view('admin.packages.createEdit');
    }

    public function createUpdate(PackagesRepository $packageService)
    {
        $data = $this->validate();
        if (!empty($this->selectedId)) {
            $packageService->update($this->selectedId, $data);
            HP::setUnitUpdatedSuccessFlash();
            $this->cancel();
        } else {
            $packageService->create($data);
            Hp::setUnitAddedSuccessFlash();
        }
        $this->resetExcept('destinations');
    }
    public function cancel()
    {
        $this->resetExcept('destinations');
        $this->redirect('/packages');
    }
}
