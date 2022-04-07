@extends('layouts.default')
@section('content')
<div class="container">
    <div class="row my-6">
        <div class="d-none d-xl-block col-xl-3 col-wd-2gdot5">
            {{-- @include('search.partials.sidebar',[
            'categoriesBuckets' => $categoriesBuckets,
            'conditionBuckets' =>$conditionBuckets,
            'formatsBuckets' => $formatsBuckets,
            'typesBuckets' => $typesBuckets,] ) --}}
        </div>

        <div class="col-xl-9 col-wd-9gdot5">
            {{--category Title--}}
            <div class="d-block d-md-flex flex-center-between mb-3">
                <h3 class="font-size-25 mb-2 mb-md-0">
                    @if($searchQuery)
                        Search results for {{$searchQuery}}
                    @else
                        Test
                    @endif
                </h3>
            </div>

            <form action="{{ route('get_results') }}">
                <div class="bg-gray-1 flex-center-between borders-radius-9 py-1">
                    <div class="d-xl-none">
                        <a id="sidebarNavToggler1" class="btn btn-sm py-1 font-weight-normal" href="javascript:;"
                        role="button"
                        aria-controls="sidebarContent1"
                        aria-haspopup="true"
                        aria-expanded="false"
                        data-unfold-event="click"
                        data-unfold-hide-on-scroll="false"
                        data-unfold-target="#sidebarContent1"
                        data-unfold-type="css-animation"
                        data-unfold-animation-in="fadeInLeft"
                        data-unfold-animation-out="fadeOutLeft"
                        data-unfold-duration="500">
                            <i class="fas fa-sliders-h"></i> <span class="ml-1">Filters</span>
                        </a>
                    </div>

                    <nav class="d-md-flex justify-content-between align-items-center border-top pt-3" aria-label="Page navigation">
                        <div class="d-flex ml-2">
                            <input type="hidden" name="q" value="{{ $searchQuery }}">

                            <select class="custom-select" onchange="form.submit()" name="sortBy">
                                <option value="popularity">Most popular</option>
                                <option value="price_low_high">Price, low to
                                    high
                                </option>
                                <option value="price_high_low">Price, high to
                                    low
                                </option>
                                <option value="pubdate_low_high">Publication
                                    date, old to new
                                </option>
                                <option value="pubdate_high_low">Publication
                                    date, new to old
                                </option>
                            </select>
                        </div>

                        <div class="float-left d-md-flex mr-2 cat-top-nav d-none d-md-block">
                            <nav class="d-md-flex justify-content-between align-items-center pt-0" aria-label="Page navigation">
                                <div class="text-center text-md-left mb-3 mb-md-0">Showing results
                                </div>&nbsp;
                                <ul class="pagination mb-0 pagination-shop justify-content-center justify-content-md-start">
                                    <li class="page-item">
                                        <input type="submit" class="btn page-link" value="1" name="page">
                                    </li>
                                    <li class="page-item">
                                        <input type="submit" class="btn page-link" value="2" name="page">
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </nav>
                </div>

                <div class="tab-pane fade pt-2 show active" role="tabpanel"
                    aria-labelledby="pills-two-example1-tab" data-target-group="groups">
                    <ul class="row list-unstyled products-group no-gutters">
                        @foreach($items as $item)
                            <livewire:product :product="(array)$item->product" />
                        @endforeach
                    </ul>
                </div>


                @php
                    $allParam = \Request::all();
                    $totalPages =  ceil( $itemsCount / 20);
                    $pageSt = 1;
                    $pageEnd = 5;
                    if(isset($page) && $page > 3 ){
                        $pageSt = $page - 2;
                        $pageEnd = $page + 2;
                    }
                @endphp
                <nav class="d-md-flex justify-content-between align-items-center border-top pt-3" aria-label="Page navigation">
                    @php
                        $from = isset($allParam['previous']) ? ($allParam['previous_value']-1)*20+1 : ($allParam['page']-1)*20+1;
                        $to = isset($allParam['previous']) ? ($allParam['previous_value']-1)*20+20 : ($allParam['page']-1)*20+20;
                    @endphp
                    <div class="text-center text-md-left mb-3 mb-md-0">Showing {{ $from }} – {{ $to }}
                        of {{ $itemsCount }} results
                    </div>
                    <ul class="pagination mb-0 pagination-shop justify-content-center justify-content-md-start">
                        <!-- send another parameter if it previous or next -->
                        <!-- <li class="page-item">
                            <input type="hidden" name="previous_value" value="{{-- $allParam['previous_value'] --}}">
                            <input type="submit" class="btn page-link {{-- ($allParam['previous_value']==1)?'disabled':'' --}}" value="previous" name="previous">
                        </li> -->

                        @for($pageSt ; $pageSt <= $pageEnd ; $pageSt++)
                            <li class="page-item">
                                <input type="submit" onclick="{{ $allParam['previous']=null }}" class="btn page-link {{($allParam['page'] == $pageSt)? 'current' : ''}}" value="{{ $pageSt }}" name="page">
                            </li>
                        @endfor

                    </ul>
                </nav>
            </form>
        </div>
    </div>
</div>
@endsection
