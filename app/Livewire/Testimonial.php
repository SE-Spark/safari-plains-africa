<?php

namespace App\Livewire;

use App\Helpers\HP;
use Livewire\Component;
use Livewire\Attributes\On;
use App\Repository\TestimonialRepository;
use Illuminate\Support\Facades\Log;

class Testimonial extends Component
{
    public $modalTitle = 'Create Testimonial';
    public $name, $message, $profession, $status, $deleteId, $selectedId;

    protected $rules = [
        'name' => 'required',
        'message' => 'required',
        'profession' => 'required',
        'status' => 'required',
    ];


    #[On('editTestimonial')]
    public function editTestimonial(TestimonialRepository $testimonialRepository, $rowId)
    {
        $this->modalTitle = 'Edit Testimonial';
        $this->selectedId = $rowId;
        $selectedTestimonial = $testimonialRepository->get()->where('id', $rowId)->first();
        $this->name = $selectedTestimonial->name;
        $this->message = $selectedTestimonial->message;
        $this->profession = $selectedTestimonial->profession;
        $this->status = $selectedTestimonial->status;
        $this->js("$('#createUpdateModal').modal('show')");
    }
    public function createUpdate(TestimonialRepository $testimonialRepository)
    {
        $data = $this->validate();
        try {
            if (!empty($this->selectedId)) {
                $testimonialRepository->update($this->selectedId, $data, );
                HP::setUnitUpdatedSuccessFlash();
            } else {
                $testimonialRepository->create($data);
                Hp::setUnitAddedSuccessFlash();
            }
            $this->js("$('#createUpdateModal').modal('hide');");
            $this->dispatch('hideSpinner');
            $this->cancel();

            $this->dispatch('pg:eventRefresh-default');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            HP::setUnitAddedErrorFlash();
        }
    }
    public function delete(TestimonialRepository $testimonialRepository)
    {
        $testimonialRepository->delete($this->deleteId);
        HP::setUnitDeletedSuccessFlash();
        $this->dispatch('pg:eventRefresh-default');
    }
    #[On('deleteTestimonial')]
    public function deleteTestimonial(TestimonialRepository $testimonialRepository, $rowId)
    {
        
        if ($testimonialRepository->get()->where('id', $rowId)->exists()) {            
            $this->deleteId = $rowId;
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
        return view('admin.testimonial.index');
    }
}
