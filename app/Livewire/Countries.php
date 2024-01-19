<?php

namespace App\Livewire;

use App\Helpers\HP;
use App\Repository\CountriesRepository;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;
use Livewire\WithFileUploads;

class Countries extends Component
{
    use WithFileUploads;
    public $name, $status;
    public $deleteId;
    public $selectedId;

    protected $rules = [
        'name' => 'required',
        'status' => 'required',
    ];
    protected $messages = [
        'name.required' => 'The Country Name is required.',
    ];

    public function mount()
    {
    }
    #[On('editCountry')]
    public function editCountry(CountriesRepository $countryService, $countryId)
    {
        $this->selectedId = $countryId;
        $selectedCountry = $countryService->get()->where('id', $countryId)->first();
        $this->name = $selectedCountry->name;
        $this->status = $selectedCountry->status;        
        $this->js("$('#destUpdateModal').modal('show')");
        // $this->dispatch('editCountries');
    }

    public function update(CountriesRepository $countryService)
    {
        $updatedData = $this->validate();
        $countryService->update($this->selectedId, $updatedData);
        $this->cancel();
        HP::setUnitUpdatedSuccessFlash();
        $this->js("$('#destUpdateModal').modal('hide');");
        $this->dispatch('pg:eventRefresh-default');
    }

    public function create(CountriesRepository $countryService)
    {
        $newCountry = $this->validate();
        try {
            $countryService->create($newCountry);
            $this->cancel();
            HP::setUnitAddedSuccessFlash();
            $this->js("$('#countryModal').modal('hide');");
            $this->dispatch('pg:eventRefresh-default');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            HP::setUnitAddedErrorFlash();
        }
    }

    public function delete(CountriesRepository $countryService)
    {
        $countryService->delete($this->deleteId);
        HP::setUnitDeletedSuccessFlash();
        $this->dispatch('pg:eventRefresh-default');
    }
    #[On('deleteCountry')]
    public function deleteCountry(CountriesRepository $countryService, $countryId)
    {
        if ($countryService->get()->where('id', $countryId)->first()) {
            $this->deleteId = $countryId;
            $this->js("$('#deleteModal').modal('show');");
        }
    }
    public function cancel()
    {
        $this->reset();
        $this->resetValidation();
    }
    public function render()
    {
        return view('admin.countries.index');
    }
}
