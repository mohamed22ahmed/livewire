<form action="{{ route('get_results') }}" class="js-focus-state">
    <input type="hidden" name="page" value="1">
    <input type="hidden" name="sortBy" value="popularity">
    <div class="input-group search_div">
        <input autocomplete="off" type="search" name="q" wire:model="search" wire:keyup="get_results" id="searchProduct"
        class="form-control py-2 pl-5 font-size-15 border-right-0 height-40 border-width-2 rounded-left-pill border-primary searchProduct search-input dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
        aria-label="Enter your Author, Title, ISBN" aria-describedby="searchProduct1" placeholder="Enter your Author, Title, ISBN" required="">
        <div class="input-group-append">
            <button class="btn btn-primary height-40 py-2 px-3 rounded-right-pill" type="submit" id="searchProduct1"> Search
            </button>
        </div>

        <div id="result-ajax-search" class="result-ajax-search dropdown-menu" style="min-height: 800px; width: 100%">
            <div class="row">
                <div class="col-md-4">
                    <h3>Results</h3>
                    <ul class="search-results" style="max-height: 380px">
                        @if ($results != null)
                            @php
                                $html_results = '';
                                foreach ($results as $indx => $result){
                                    if($indx%2 == 0)
                                        $html_results .= "<div class='row'>";
                                    $html_results .= "<div class='col-md-6'>";

                                    $author='';
                                    if ($result->product->author){
                                        $authors = (array)$result->product->author;
                                        $author .= "<h5 class='mb-1 product-item__title book_author'>";
                                        foreach ($authors as $one) {
                                            $author .="<span>$one</span> &nbsp;";
                                        }
                                        $author .="</h5>";
                                    }else{
                                        $author .="<h5 class='mb-1 product-item__title book_author'> No Author </h5>";
                                    }

                                    $title = $result->product->title;
                                    $slug = trim($title); // trim the string
                                    $slug= preg_replace('/[^a-zA-Z0-9 -]/','',$slug ); // only take alphanumerical characters, but keep the spaces and dashes too...
                                    $slug= str_replace(' ','-', $slug); // replace spaces by dashes
                                    $slug= strtolower($slug);  // make it lowercase

                                    $html_results .= "<div class='product-item__body pb-xl-2'>
                                            <div class='mb-2 overflow-hidden' style='height: 70px;'>
                                                <a href='/book/" . "$title/$slug/used' class='d-block text-left'>
                                                    <img class='img-fluid' src='".$result->product->photo."' alt='".$title."' style='max-height: 200px;'>
                                                </a>
                                            </div>
                                            <a href='/book/" . "$title/$slug/used' class='font-weight-bold'>$title</a> $author
                                        </div>";

                                    $html_results .= "</div>";

                                    if($indx%2 == 1)
                                        $html_results .= "</div><br>";
                                }
                            @endphp

                            {!! $html_results !!}
                        @endif
                    </ul>
                </div>

                <div class="col-md-4">
                    <h3>Previous &nbsp; <a href="{{ route('clear_previous_search') }}" style="font-size:18px">Clear</a></h3>
                    @if ($previous_search != null)
                        @foreach ($previous_search as $previous)
                        <h4>
                            <a href="/get_results?q={{ $previous }}&page=1&sortBy=popularity">{{ $previous }}</a>
                        </h4><br>
                        @endforeach
                    @endif
                </div>

                <div class="col-md-4">
                    <h3>Suggested</h3>
                    @if ($suggested_words != null)
                        @foreach ($suggested_words as $word)
                                <h4>
                                    <a href="/get_results?q={{ $word['product']['title'] }}&page=1&sortBy=popularity">{{ $word['product']['title'] }}</a>
                                </h4><br>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</form>

@livewireScripts
<script>
    document.getElementById("searchProduct").addEventListener("keyup", search_results);

    function search_results(){
        if(document.getElementById('searchProduct').value != ''){
            document.getElementById('result-ajax-search').addClass('open'); // Opens the dropdown
            // document.getElementById('searchProduct').removeClass('open');
        }
    }

</script>
