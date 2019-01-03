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
                                    <h1>Thanh toán</h1>
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
            <div class="row row-pb-md">
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
                        <div class="process text-center">
                            <p><span>03</span></p>
                            <h3>Hoàn tất thanh toán</h3>
                        </div>
                    </div>
                </div>
            </div>
            <form class="row colorlib-form" method="post">
                <div class="col-md-7">
                <h2>Chi tiết thanh toán</h2>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="fname">Họ & Tên</label>
                            <input type="text" value="{{!is_null(Auth::user()) ? Auth::user()->fullname : null}}" name="name" id="fname" class="form-control" placeholder="First Name">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="fname">Địa chỉ</label>
                            <input type="text" value="{{!is_null(Auth::user()) ? Auth::user()->address : null}}" name="address" id="address" class="form-control" placeholder="Nhập địa chỉ của bạn">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <label for="email">Địa chỉ email</label>
                            <input type="email" id="email" value="{{!is_null(Auth::user()) ? Auth::user()->email : null}}" name="email" class="form-control" placeholder="Ex: youremail@domain.com">
                        </div>
                        <div class="col-md-6">
                            <label for="Phone">Số điện thoại</label>
                            <input type="text" value="{{!is_null(Auth::user()) ? Auth::user()->phone : null}}" name="phone" id="zippostalcode" class="form-control" placeholder="Ex: 0123456789">
                        </div>
                    </div>
                </div>
                </div>
                <div class="col-md-5">
                    <div class="cart-detail">
                        <h2>Tổng Giỏ hàng</h2>
                        <ul>
                            <li>
                                <span>Tổng số tiền</span> <span>@money($carts->reduce(function ($carry, $cart) use (&$totalPrice) {
                                    $totalPrice += ($cart->price * $cart->quantity);
                                    return ($cart->price * $cart->quantity) +  $carry;
                                    }, 0), 'VND')</span>
                                <ul>
                                   @foreach ($carts as $item)
                                   <li><span>{{$item->quantity}} x {{$item->product->name}}
                                        @if(isset($item->sku->values))
                                            @foreach ($item->sku->values as $value)
                                            -{{$value->value->value}}
                                            @endforeach
                                        @endif
                                    </span> <span>@money($item->price * $item->quantity, 'VND')</span>
                                    </li>
                                   @endforeach
                                </ul>
                            </li>
                            <li><span>Tổng tiền đơn hàng</span> <span>@money($totalPrice, 'VND')</span></li>
                        </ul>
                    </div>
                    <div class="cart-detail">
                        <h2>Phương thức thanh toán</h2>
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="radio">
                                    <label><input type="radio" value="transfer_bank" name="payment_method">Chuyển khoản qua ngân hàng</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="radio">
                                    <label><input type="radio" value="direct_payment" name="payment_method">Thanh toán trực tiếp khi giao hàng</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="checkbox">
                                    <label><input name="accept" type="checkbox">Tôi đã đọc và chấp nhận tất cả các điều khoản</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <p><button  class="btn btn-primary">Thanh toán</button></p>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@stop

