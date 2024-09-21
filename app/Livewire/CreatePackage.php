<?php

namespace App\Livewire;

use App\Helpers\HP;
use App\Repository\DestinationsRepository;
use App\Repository\{PackagesRepository, GroupRepository};
use Livewire\Component;
use Illuminate\Support\Facades\File;
use Livewire\WithFileUploads;

class CreatePackage extends Component
{
    use WithFileUploads;
    public $modalTitle = "Create Package";
    public $name, $summary, $description, $number_of_days, $status, $destinationId = [], $group_id, $destinations, $groups, $price = 140, $number_of_people = 4, $start_date, $end_date;
    public $deleteId, $selectedId, $image_photos = [], $image_urls = [], $isSubmitting = false;

    protected $rules = [
        'name' => 'required',
        'image_photos.*' => 'required_without:selectedId',
        'summary' => 'required',
        'description' => 'required',
        'price' => 'nullable', //removed
        'destinationId' => 'required',
        'group_id' => 'required',
        'number_of_people' => 'nullable', //removed
        'number_of_days' => 'required',
        'start_date' => 'nullable', //removed
        'end_date' => 'nullable', //removed
        'status' => 'required',
    ];

    protected $messages = [
        'image_photo.required_without' => 'The image photo field is required.',
    ];

    public function mount(PackagesRepository $packageService, DestinationsRepository $destinationService, GroupRepository $groupRepository, $selection = null)
    {
        $this->start_date = \Carbon\Carbon::now();
        $this->end_date = \Carbon\Carbon::now();
        $this->destinations = $destinationService->get()->where('status', 1)->get(['id', 'name']);
        $this->groups = $groupRepository->get()->where('status', 1)->get(['id', 'name']);
        if ($selection) {
            $this->modalTitle = "Edit Package";
            $this->selectedId = $selection;
            $selectedPackage = $packageService->get()->where('id', $selection)->first();
            // dd($selectedPackage);
            $this->name = $selectedPackage->name;
            $this->image_urls = !empty($selectedPackage->image_urls)
                ? explode(',', $selectedPackage->image_urls)
                : [];
            $this->summary = $selectedPackage->summary;
            $this->description = $selectedPackage->description;
            // $this->price = $selectedPackage->price;
            $this->destinationId = $selectedPackage->destinations->pluck('id') ?? [];
            $this->group_id = $selectedPackage->group_id;
            // $this->number_of_people = $selectedPackage->number_of_people;
            $this->number_of_days = $selectedPackage->number_of_days;
            // $this->start_date =  \Carbon\Carbon::parse($selectedPackage->startdate)->format('Y-m-d');
            // $this->end_date = \Carbon\Carbon::parse($selectedPackage->end_date)->format('Y-m-d');
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
        // $this->dispatch('showSpinner');
        if (!empty($this->selectedId)) {
            if (!empty($this->image_photos)) {
                $imageUrls = [];
                foreach ($this->image_photos as $photo) {
                    $filename = uniqid() . '' . time() . '.' . $photo->extension();
                    $filePath = public_path('assets/images');
                    $fullPath = $filePath . '/' . $filename;
                    if (!File::exists($filePath)) {
                        File::makeDirectory($filePath, 0755, true); // Recursive directory creation
                    }
                    File::put($fullPath, file_get_contents($photo->getRealPath()));
                    $imageUrls[] = $filename;
                }
                $data['image_urls'] = implode(',', $imageUrls);
            }
            $packageService->updateWithDestinations($this->selectedId, $data, $this->destinationId);
            HP::setUnitUpdatedSuccessFlash();
        } else {
            $packageService->createWithDestinations($data, $this->destinationId);
            Hp::setUnitAddedSuccessFlash();
        }
                
        $this->dispatch('hideSpinner');
        $this->cancel();
    }
    public function cancel()
    {
        $this->resetExcept(['destinations', 'groups']);
        $this->redirect(route('admin.packages'));
    }
}
