@extends('layouts.default')
@section('content')
    <div class="row">
        <livewire:filters :facets="$facets" />

        <div class="col-xl-9 col-wd-9gdot5">
            {{--category Title--}}
            <div class="d-block d-md-flex  align-items-center justify-content-center mb-3">
                <h3 class="font-size-25 mb-2 mb-md-0">
                    @if($searchQuery)
                        Search results for {{ $searchQuery }}
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
                        <livewire:sort-by :q="$searchQuery" />

                        <div class="float-left d-md-flex mr-2 cat-top-nav d-none d-md-block">
                            <livewire:pagination :itemsCount="$itemsCount" />
                        </div>
                    </nav>
                </div>

                <div class="tab-pane fade pt-2 show active" role="tabpanel"
                    aria-labelledby="pills-two-example1-tab" data-target-group="groups">
                    <ul class="row list-unstyled products-group no-gutters">
                        @foreach($items as $item)
                            <livewire:product :product="(array)$item->product" :wire:key="$loop->index" />
                        @endforeach
                    </ul>
                </div>

                <livewire:pagination :itemsCount="$itemsCount" />

            </form>
        </div>
    </div>
@endsection
