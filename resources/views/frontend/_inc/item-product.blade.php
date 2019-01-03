<div class="col-md-3 text-center">
    <div class="product-entry">
        <div class="product-img" style="background-image: url({{$product->thumbnail}});">
            <p class="tag"><span class="new">New</span></p>
            <div class="cart">
                <p>
                    <span class="addtocart"><a onClick="return addToCart({{$product->id}})" href=""><i class="icon-shopping-cart"></i></a></span>
                    <span><a href="{{route('product.detail', $product->slug)}}"><i class="icon-eye"></i></a></span>
                </p>
            </div>
        </div>
        <div class="desc">
            <h3><a href="{{route('product.detail', $product->slug)}}">{{$product->name}}</a></h3>
            <p class="price"><span>@money($product->sale_price, 'VND')</span></p>
        </div>
    </div>
   
</div>