<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SuggestController extends Controller
{
    public function get_suggested_words($search)
    {
        $itemArray = [];
        $search_token = env('ATTRAQT_SEARCH_TOKEN');

        $itemArray["token"] = $search_token;
        $itemArray["query"] = $search;
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
}
