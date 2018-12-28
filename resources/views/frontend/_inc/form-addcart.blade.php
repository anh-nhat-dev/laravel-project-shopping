<form class="row row-pb-lg" action="{{route('carts.add-cart')}}" method="POST">
        <div class="col-md-10 col-md-offset-1">
            <div class="product-detail-wrap">
                <div class="row">
                    <div class="col-md-5">
                        <div class="product-entry">
                            <div class="product-img" style="background-image: url({{asset($product->thumbnail)}});">
                                <p class="tag"><span class="sale">Sale</span></p>
                            </div>
                            <div class="thumb-nail">
                                @foreach ($product->gallery as $item)
                                <a href="#" class="thumb-img" style="background-image: url({{asset($item->link)}});"></a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="desc">
                            <h3>{{$product->name}}</h3>
                            <p class="price">
                                <span>@money($product->sale_price, 'VND')</span>
                                <span class="rate text-right">
                                    @for($i = 1; $i <= 5 ; $i++)
                                        @if(($i - 0.5) == $product->total_star)
                                            <i class="icon-star-half"></i>
                                        @elseif(($i <= $product->total_star))
                                            <i class="icon-star-full"></i>
                                        @else
                                            <i class="icon-star-empty"></i>
                                        @endif
                                    @endfor
                                    ({{$product->reviews()->count()}} Rating)
                                </span>
                            </p>
                            <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life
                                One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of
                                Grammar.</p>
                            @if(count($colors) > 0)
                            <div class="color-wrap">
                                <p class="color-desc" id="color">  Màu sắc:
                                    @foreach ($colors as $color)
                                        <a href="#" data-id="{{$color->first()->value->id}}" style="background-color: {{$color->first()->value->options}}" class="color"></a>
                                    @endforeach
                                    <input type="hidden" name="color_id">
                                </p>
                            </div>
                            @endif

                            <div class="size-wrap">
                                <p class="size-desc" id="size">
                                   
                                </p>
                            </div>
                            <div class="row row-pb-sm">
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <button type="button" class="quantity-left-minus btn" data-type="minus" data-field="">
                                                <i class="icon-minus2"></i>
                                            </button>
                                        </span>
                                        <input type="text" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="100">
                                        <span class="input-group-btn">
                                            <button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
                                                <i class="icon-plus2"></i>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <p><a type="submit"  id="addtocart" class="btn btn-primary btn-addtocart"><i class="icon-shopping-cart"></i> Thêm vào giỏ hàng</a></p>
                            <input type="hidden" name="product_id" value="{{$product->id}}">
                            <input type="hidden" name="sku_id" value="" id="sku_id">
                            <button id="buttonaddtocart" class="hidden" type="submit">Add to cart</button>
                            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
<script>
    var Skus = @json($product->skus);
   if (typeof addCart === 'function') {
    addCart()
   }
</script>