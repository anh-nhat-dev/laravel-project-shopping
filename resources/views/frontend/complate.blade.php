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
                                    <h1>Hoàn tất thanh toán</h1>
                                    <h2 class="bread"><span><a href="index.html">Trang chủ</a></span> <span><a href="cart.html">Giỏ hàng</a></span>
                                        <span>Thanh toán</span></h2>
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
            <div class="row row-pb-lg">
                <div class="col-md-10 col-md-offset-1">
                    <div class="process-wrap">
                        <div class="process text-center active">
                            <p><span>01</span></p>
                            <h3>Giỏ hàng</h3>
                        </div>
                        <div class="process text-center active">
                            <p><span>02</span></p>
                            <h3>Thanh toán</h3>
                        </div>
                        <div class="process text-center active">
                            <p><span>03</span></p>
                            <h3>Hoàn tất thanh toán</h3>
                        </div>
                    </div>
                </div>
            </div>
           
            <div class="row">
                <div class="col-md-10 col-md-offset-1 text-center">
                    <span class="icon"><i class="icon-shopping-cart"></i></span>
                    <h2>Cảm ơn bạn đã mua hàng, Đơn hàng của bạn đã đặt thành công</h2>
                    <p>
                        <a href="{{route('home')}}" class="btn btn-primary">Trang chủ</a>
                        <a href="shop.html" class="btn btn-primary btn-outline">Tiếp tục mua sắm</a>
                    </p>
                </div>
            </div>
        @if (isset($order))
            @include('frontend._inc.order-success')
        @endif
        </div>

        
    </div>

@stop

@section('style')
<link rel="stylesheet" href="css/custome.css">
@stop