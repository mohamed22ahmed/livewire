<?php

namespace App\Http\Livewire;

use http\Message\Body;
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
        $this->suggested_words = $this->get_suggested_words();
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
        if (count($items) > 0) {
            return $items;
        }
    }

    private function get_suggested_words()
    {
        $itemArray = [];
        $search_token = '62069665d3c4595334f58a35';
        $itemArray["token"] = $search_token;
        $itemArray["query"] = $this->search;
        $itemArray["options"] = [
            "customResponseMask" => "id, product(title,author, price,sales_rank, photo)",
            "filter" => "",
            "offset" => 0,
            "limit" => 6
        ];
        $itemArray["options"]["groupBy"] = [
            "attribute" => "kind",
            "size" => 6,
            "values" => ["product"]
        ];
        $itemArray["options"]["sortBy"][] = [
            "attribute" => "sales_rank",
            "order" => "asc"
        ];

        $search_results = Http::acceptJson()
            ->post('https://api-eu.attraqt.io/search/suggest', $itemArray);

        $items = $search_results->json();

        if($items['groups']){
            $items = $items['groups'][0]['items'];
            if (count($items) > 0) {
                return $items;
            }
        }
        return [];
    }

    public function render()
    {
        return view('livewire.search');
    }
}
