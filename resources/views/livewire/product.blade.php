<li class="col-6 col-md-3 col-wd-2gdot4">
    <div class="product-book">
        <div class="product-item__outer h-100">
            <div class="product-item__inner px-wd-4 p-2 p-md-3">
                <div class="product-item__body pb-xl-2">
                    <div class="mb-2 overflow-hidden" style="min-height: 200px;">
                        <a href="#" class="d-block text-left">
                            @php
                                $imagePath = config('app.image_url').'/images/books/medium/'. Str::substr($product['ean'], 0,5).'/'.$product['ean'].'.jpg';
                            @endphp
                            <img class="img-fluid" src="{{$imagePath}}" alt="{{$product['title']}}" style="max-height: 200px;"></a>
                    </div>
                    <h5 class="mb-1 product-item__title book_title">
                        <a href="#" class="font-weight-bold">{{$product['title']}}</a></h5>

                    @if($product['author'])
                        <h5 class="mb-1 product-item__title book_author">
                            @foreach((array)$product['author'] as $one)
                                <a href="#" itemprop="url">{{$one}}</a>
                            @endforeach
                        </h5>
                    @else
                        <h5 class="mb-1 product-item__title book_author"> </h5>
                    @endif

                    <div class="product-condation">
                        <span class="text-gray-6 font-size-13 ">{{$product['format']?? ''}}</span>
                        | From
                    </div>
                    <div class="pricing mb-0" style="min-height: 2.7rem;">
                        <div class="product-price">
                            @if(!empty($product['price']) && $product['price'] > $product['lowest_price'])
                                <span class="rrp">{{ $product['price'] }} </span>
                            @endif
                            <span class=""> {{$product['lowest_price']? $product['lowest_price']:''}} </span>
                        </div>
                        @if(!empty($product['price']) && $product['price'] > $product['lowest_price'])
                            <span class="rrp text-primary">Save {{$product['price'] - $product['lowest_price']  }} </span>
                        @endif
                    </div>
                    <div class="item-action product-item-actions">
                        @php
                            $authors = implode(',', (array)$product['author']);
                        @endphp

                            Add To Basket
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</li>
