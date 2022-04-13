<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SearchController extends Controller
{
    public function index(){
        return view('pages.search');
    }

    public function get_results(Request $request){
        // pagination = number of page * 20(limit number)
        $page = isset($request->page) ? $request->page : 1;

        // sortBy from request
        $sortBy = isset($request->sortBy) ? $request->sortBy : 'popularity';

        switch ($sortBy) {
            case 'price_low_high':
                $attribute = 'price';
                $order = 'asc';
                break;
            case 'price_high_low':
                $attribute = 'price';
                $order = 'desc';
                break;
            case 'pubdate_low_high':
                $attribute = 'release_year';
                $order = 'asc';
                break;
            case 'pubdate_high_low':
                $attribute = 'release_year';
                $order = 'desc';
                break;
            default: // this for popularity
                $attribute = 'sales_rank';
                $order = 'desc';
                break;
        }

        $itemArray = json_encode([
            'query' => $request->q,
            'options' => [
                'offset' => ($page - 1) * 20,
                'limit' => 20,
                "sortBy" => [
                    [
                        "attribute" => $attribute,
                        "order" => $order
                    ]
                ]
            ]
        ]);

        $search_token =  env('ATTRAQT_SEARCH_TOKEN');
        $results = Http::get("https://api-eu.attraqt.io/search/$search_token?encoded=$itemArray");

        $items = json_decode($results->body())->items;
        if (count($items) > 0) {
            $itemsCount = json_decode($results->body())->metadata->count;
            $facets = json_decode($results->body())->metadata->facets;
            $this->set_previous_search($request->q);

            return view('pages.search')->with(['items' => $items, 'facets' => $facets, 'searchQuery' => $request->q, 'itemsCount' => $itemsCount]);
        } else {
            return redirect()->back()->withErrors("We're sorry! We couldn't find any results. Please try again.");
        }
    }

    public function set_previous_search($q)
    {
        $previous_search_array = (array)session()->get('previous_search') ?? [];
        if (count($previous_search_array) == 6) {
            array_shift($previous_search_array);
        }
        array_push($previous_search_array, $q);
        session()->put('previous_search', $previous_search_array);
    }

    public function clear_previous_search()
    {
        session()->put('previous_search', []);
        return redirect()->back();
    }
}
