<div class="product-cart">
    <div class="one-forth">
        <div class="product-img" style="background-image: url({{$cart->product->thumbnail}});">
        </div>
        <div class="display-tc">
            <h3>{{$cart->product->name}}</h3>
            @if(isset($cart->sku->values))
                @foreach ($cart->sku->values as $item)
                    <p >{{$item->attribute->name}}: <b>{{$item->value->value}}</b></p>
                @endforeach
            @endif
        </div>
    </div>
    <div class="one-eight text-center">
        <div class="display-tc">
            <span class="price">@money($cart->price, 'VND')</span>
        </div>
    </div>
    <div class="one-eight text-center">
        <div class="display-tc">
            <input type="text" id="quantity" name="quantity" class="form-control input-number text-center" value="{{$cart->quantity}}" min="1"
             max="100">
        </div>
    </div>
    <div class="one-eight text-center">
        <div class="display-tc">
            <span class="price">@money(($cart->price *$cart->quantity), 'VND' )</span>
        </div>
    </div>
    <div class="one-eight text-center">
        <div class="display-tc">
            <a href="" class="closed"></a>
        </div>
    </div>
</div>