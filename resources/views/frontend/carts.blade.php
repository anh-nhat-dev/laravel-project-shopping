@extends('layout.fontend.master')

@section('content')
<aside id="colorlib-hero" class="breadcrumbs">
    <div class="flexslider">
        <ul class="slides">
            <li style="background-image: url(images/cover-img-1.jpg);">
                <div class="overlay"></div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
                            <div class="slider-text-inner text-center">
                                <h1>Giỏ hàng</h1>
                            <h2 class="bread"><span><a href="{{route('home')}}">Trang chủ</a></span> <span><a href="{{route('shop')}}">Sản phẩm</a></span>
                                    <span>Giỏ hàng</span></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</aside>

<div class="colorlib-shop">
    <div class="container">
        <div class="row row-pb-md">
            <div class="col-md-10 col-md-offset-1">
                <div class="process-wrap">
                    <div class="process text-center active">
                        <p><span>01</span></p>
                        <h3>Giỏ hàng</h3>
                    </div>
                    <div class="process text-center">
                        <p><span>02</span></p>
                        <h3>Thanh toán</h3>
                    </div>
                    <div class="process text-center">
                        <p><span>03</span></p>
                        <h3>Hoàn tất thanh toán</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="row row-pb-md">
            <div class="col-md-10 col-md-offset-1">
                <div class="product-name">
                    <div class="one-forth text-center">
                        <span>Chi tiết sản phẩm</span>
                    </div>
                    <div class="one-eight text-center">
                        <span>Giá</span>
                    </div>
                    <div class="one-eight text-center">
                        <span>Số lượng</span>
                    </div>
                    <div class="one-eight text-center">
                        <span>Tổng</span>
                    </div>
                    <div class="one-eight text-center">
                        <span>Xóa</span>
                    </div>
                </div>
                @each('frontend._inc.product-cart', $carts, 'cart', 'frontend._inc.product-cart-empty')
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="total-wrap">
                    <div class="row">
                        <div class="col-md-8">
                            <form action="#">
                                <div class="row form-group">
                                    <div class="col-md-9">
                                        <input type="text" name="quantity" class="form-control input-number" placeholder="Nhập mã khuyễn mãi...">
                                    </div>
                                    <div class="col-md-3">
                                        <input type="submit" value="Áp dụng" class="btn btn-primary">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-3 col-md-push-1 text-center">
                            <div class="total">
                                <div class="sub">
                                    <p><span>Tổng:</span> <span>@money(($carts->reduce(function($carry, $item) use (&$totalPrice) {
                                        $totalPrice += $item->price * $item->quantity;
                                        return ($item->price * $item->quantity) + $carry;
                                        },0)), 'VND')</span></p>
                                    <p><span>Khuyễn mãi:</span> <span>- @money($totalSale, 'VND')</span></p>
                                </div>
                                <div class="grand-total">
                                    <p><span><strong>Tổng cộng:</strong></span> <span>@money(($totalPrice + $totalSale), 'VND')</span></p>
                                <a href="{{route('carts.checkout')}}" class="btn btn-primary">Thanh toán <i class="icon-arrow-right-circle"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop