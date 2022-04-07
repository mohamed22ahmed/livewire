<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Search extends Component
{
    public $suggested_words = [];
    public $results = [];
    public $previous_search = [];

    public $search = '';

    public function get_results()
    {
        $this->suggested_words = [$this->search,$this->search,$this->search];
        $this->results = $this->get_search_results();
        $this->previous_search = (array)session()->get('previous_search') ?? [];
    }

    private function get_search_results()
    {
        $itemArray = json_encode([
            'query' => $this->search,
            'options' => [
                'offset' => 0,
                'limit' => 6
            ]
        ]);
        $search_token = '62069665d3c4595334f58a35';

        $search_results = Http::get("https://api-eu.attraqt.io/search/$search_token?encoded=$itemArray");

        $items = json_decode($search_results->body())->items;

        if(count($items) > 0){
            return $items;
        }
    }

    public function render()
    {
        return view('livewire.search');
    }
}
