<?php

namespace App\Livewire;

use App\Helpers\HP;
use App\Repository\CountriesRepository;
use App\Repository\DestinationsRepository;
use Livewire\Component;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;
use Livewire\WithFileUploads;

class CreateDestination extends Component
{
    use WithFileUploads;
    public $modalTitle = "Create Destination";
    public $name, $address, $description, $image_url, $image_photo,$country_id, $status;
    public $countries;
    public $selectedDestination_id;

    
    protected $rules = [
        'name' => 'required',
        'address' => 'required',
        'description' => 'required',
        'image_photo' => 'required_without:selectedDestination_id',
        'status' => 'required',
        'country_id' => 'required',
    ];
    protected $messages = [
        'image_photo.required_without' => 'The image field is required.',
        'country_id.required' => 'The Country field is required.',
    ];

    public function mount(DestinationsRepository $destinationService, CountriesRepository $countryService, $selection = null)
    {
        
        $this->countries = $countryService->getItems(['name','id'],['status'=>1]);
        if ($selection) {
            $this->modalTitle = "Edit Destination";
            $this->selectedDestination_id = $selection;
            $selectedDestination = $destinationService->get()->where('id', $selection)->first();
            $this->name = $selectedDestination->name;
            $this->address = $selectedDestination->address;
            $this->description = $selectedDestination->description;
            $this->image_url = $selectedDestination->image_url;
            $this->country_id = $selectedDestination->country_id;       
            $this->status = $selectedDestination->status;
        }
    }

    public function render()
    {

        return view('admin.destinations.createEdit');
    }

    public function createUpdate(DestinationsRepository $destinationService)
    {
        $data = $this->validate();
        if (!empty($this->selectedDestination_id)) {
            
            if (!empty($this->image_photo)) {
                $filename = uniqid() . '' . time() . '.' . $this->image_photo->extension();
                $filePath = public_path('assets/images');
                $fullPath = $filePath . '/' . $filename;
                if (!File::exists($filePath)) {
                    File::makeDirectory($filePath, 0755, true); // Recursive directory creation
                }
                File::put($fullPath, file_get_contents($this->image_photo->getRealPath()));
                $data['image_url'] = $filename;
            }
            $destinationService->update($this->selectedDestination_id, $data);
            $this->cancel();
            HP::setUnitUpdatedSuccessFlash();
            $this->cancel();
        } else {
            $filename = uniqid() . '' . time() . '.' . $this->image_photo->extension();
            $filePath = public_path('assets/images');
            $fullPath = $filePath . '/' . $filename;
            if (!File::exists($filePath)) {
                File::makeDirectory($filePath, 0755, true); // Recursive directory creation
            }
            File::put($fullPath, file_get_contents($this->image_photo->getRealPath()));
            $data['image_url'] = $filename;
            $destinationService->create($data);
            
            Hp::setUnitAddedSuccessFlash();
        }
        $this->resetExcept(['countries']);
    }
    public function cancel()
    {
        $this->resetExcept(['countries']);
        $this->redirect(route('admin.destinations'));
    }
}
