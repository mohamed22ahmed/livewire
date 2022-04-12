<?php

namespace App\Http\Livewire;

use http\Message\Body;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Search extends Component
{
    public $results = [];
    public $previous_search = [];

    public $search = '';

    public function get_results()
    {
        if(strlen($this->search) >= 3){
            $this->results = $this->get_search_results();
            $this->previous_search = (array)session()->get('previous_search') ?? [];
        }
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
        $search_token = env('ATTRAQT_SEARCH_TOKEN');

        $search_results = Http::get("https://api-eu.attraqt.io/search/$search_token?encoded=$itemArray");
        $items = json_decode($search_results->body())->items;
        if (count($items) > 0) {
            return $items;
        }
    }

    public function render()
    {
        return view('livewire.search');
    }
}
