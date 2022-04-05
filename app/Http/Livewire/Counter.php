<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Search extends Component
{
    public $suggested_words = [];
    public $results = [];
    public $search = 'test';

    public function searchFunction()
    {
        // $this->search = $search;
        $this->suggested_words = [$this->search,$this->search,$this->search];
        $this->results = [$this->search,$this->search,$this->search];
    }

    public function render()
    {
        return view('livewire.counter');
    }
}
