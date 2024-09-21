<?php

namespace App\Livewire;

use Livewire\Component;

class PackageCard extends Component
{
    public $pack;

    public function mount($pack)
    {
        $this->pack = $pack;
    }

    public function render()
    {
        return view('livewire.package-card');
    }
}
