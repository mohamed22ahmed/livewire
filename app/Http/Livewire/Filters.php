<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Filters extends Component
{
    public $facets;
    public function render()
    {
        return view('livewire.filters');
    }
}
