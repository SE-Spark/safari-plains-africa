<?php

namespace App\Livewire;

use App\Helpers\HP;
use App\Repository\DestinationsRepository;
use App\Repository\{PackagesRepository, GroupRepository};
use Livewire\Component;
use Illuminate\Support\Facades\File;
use Livewire\WithFileUploads;

class CreateIternary extends Component
{
    use WithFileUploads;
    public $modalTitle = "Create Package";
    public $name, $tag, $summary, $description, $number_of_days, $status, $destinationId = [], $group_id, $destinations, $groups, $price, $number_of_people = 4, $start_date, $end_date;

    public $deleteId, $selectedId, $image_photos = [], $image_urls = [], $isSubmitting = false;
    public $dest_days = [
        [
            'days' => '',
            'location' => '',
            'description' => '',
            'image' => '',
            'image_temp' => '',
            'stay_location' => '',
            'stay_loc_image' => '',
            'stay_loc_image_temp' => '',
            'stay_name' => '',
            'stay_description' => '',
        ]
    ];
    public $iternary_details, $haves_and_not_haves, $trip_highlights = [['name' => '']];

    protected $rules = [
        'name' => 'required',
        'tag' => 'nullable',
        'image_photos.*' => 'required_without:selectedId',
        'summary' => 'nullable',
        'description' => 'nullable',
        'price' => 'nullable', //removed
        'destinationId' => 'nullable',
        'group_id' => 'required',
        'number_of_people' => 'nullable', //removed
        'number_of_days' => 'required',
        'start_date' => 'nullable', //removed
        'end_date' => 'nullable', //removed
        'status' => 'required',
        'iternary_details' => 'nullable|string',
        'haves_and_not_haves' => 'nullable|string',
        'trip_highlights' => 'nullable|array',
        'trip_highlights.*.name' => 'required|string',
        'dest_days' => 'required|array',
        'dest_days.*.days' => 'required|string',
        'dest_days.*.location' => 'required|string',
        'dest_days.*.description' => 'nullable|string',
        'dest_days.*.image_temp' => 'nullable|image',
        'dest_days.*.stay_location' => 'nullable|string',
        'dest_days.*.stay_loc_image_temp' => 'nullable|image',
        'dest_days.*.stay_name' => 'nullable|string',
        'dest_days.*.stay_description' => 'nullable|string',
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
            $this->tag = $selectedPackage->tag;
            $this->image_urls = !empty($selectedPackage->image_urls)
                ? explode(',', $selectedPackage->image_urls)
                : [];
            $this->summary = $selectedPackage->summary;
            $this->description = $selectedPackage->description;
            $this->price = $selectedPackage->price;
            $this->destinationId = $selectedPackage->destinations->pluck('id') ?? [];
            $this->group_id = $selectedPackage->group_id;
            $this->number_of_people = $selectedPackage->number_of_people;
            $this->number_of_days = $selectedPackage->number_of_days;
            // $this->start_date =  \Carbon\Carbon::parse($selectedPackage->startdate)->format('Y-m-d');
            // $this->end_date = \Carbon\Carbon::parse($selectedPackage->end_date)->format('Y-m-d');
            $this->status = $selectedPackage->status;
            $this->iternary_details = $selectedPackage->iternary_details;
            $this->haves_and_not_haves = $selectedPackage->haves_and_not_haves;
            $this->trip_highlights = json_decode($selectedPackage->trip_highlights, true) ?? [];
            // Set dest_days based on the selected package's details
            $this->dest_days = json_decode($selectedPackage->dest_days, true) ?? []; // Decode JSON to array
        }
    }

    public function render()
    {

        return view('admin.iternary.createEdit');
    }

    public function createUpdate(PackagesRepository $packageService)
    {
        $data = $this->validate();
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
        // Handle images in dest_days
        foreach ($this->dest_days as $index => $day) {
            if (isset($day['image_temp']) && $day['image_temp'] instanceof \Illuminate\Http\UploadedFile) {
                $filename = uniqid() . '' . time() . '.' . $day['image_temp']->extension();
                $filePath = public_path('assets/images');
                $fullPath = $filePath . '/' . $filename;
                if (!File::exists($filePath)) {
                    File::makeDirectory($filePath, 0755, true); // Recursive directory creation
                }
                File::put($fullPath, file_get_contents($day['image_temp']->getRealPath()));
                $this->dest_days[$index]['image'] = $filename;
                $this->dest_days[$index]['image_temp'] = ''; // Store the filename in the dest_days array
            }
            if (isset($day['stay_loc_image_temp']) && $day['stay_loc_image_temp'] instanceof \Illuminate\Http\UploadedFile) {
                $filename = uniqid() . '' . time() . '.' . $day['stay_loc_image_temp']->extension();
                $filePath = public_path('assets/images');
                $fullPath = $filePath . '/' . $filename;
                if (!File::exists($filePath)) {
                    File::makeDirectory($filePath, 0755, true); // Recursive directory creation
                }
                File::put($fullPath, file_get_contents($day['stay_loc_image_temp']->getRealPath()));
                $this->dest_days[$index]['stay_loc_image'] = $filename; // Store the filename in the dest_days array
                $this->dest_days[$index]['stay_loc_image_temp'] = '';
            }
        }
        $data['trip_highlights'] = json_encode($this->trip_highlights); // Convert to JSON if needed

        $data['dest_days'] = json_encode($this->dest_days); // Convert to JSON if needed

        // $this->dispatch('showSpinner');
        if (!empty($this->selectedId)) {
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
        $this->redirect(route('admin.iternaries'));
    }

    public function addDestDay()
    {
        $this->dest_days[] = [
            'days' => '',
            'location' => '',
            'description' => '',
            'image' => '',
            'image_temp' => '',
            'stay_location' => '',
            'stay_loc_image' => '',
            'stay_loc_image_temp' => '',
            'stay_name' => '',
            'stay_description' => '',
        ];
    }
    public function removeDestDay($index)
    {
        array_splice($this->dest_days, $index, 1);
    }

    public function addTripHighlight()
    {
        $this->trip_highlights[] = ['name' => ''];
    }
    public function removeTripHighlight($index)
    {
        array_splice($this->trip_highlights, $index, 1);
    }
}
