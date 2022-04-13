<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SortBy extends Component
{
    public $q;
    public $sortBy = '';

    public $groups = [
        'popularity' => 'Most popular',
        'price_low_high' => 'Price, low to high',
        'price_high_low' => 'Price, high to low',
        'pubdate_low_high' => 'Publication date, old to new',
        'pubdate_high_low' => 'Publication date, new to old'
    ];

    public function mount(){
        $this->sortBy = request()->sortBy;
    }

    public function render(){
        return view('livewire.sort-by');
    }
}
