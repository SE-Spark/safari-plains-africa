<?php

namespace App\Http\Controllers;

use Livewire\Component;

class PackageController extends Component
{

    public function render()
    {
        return view('front.package')->layout('front.layouts.app');
    }
}
