@extends('layout.fontend.master')

@section('content')
<aside id="colorlib-hero">
    <div class="flexslider">
        <ul class="slides">
            <li style="background-image: url(images/img_bg_1.jpg);">
                <div class="overlay"></div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3 col-md-pull-2 col-sm-12 col-xs-12 slider-text">
                            <div class="slider-text-inner">
                                <div class="desc">
                                    <h1 class="head-1">Men's</h1>
                                    <h2 class="head-2">Jeans</h2>
                                    <h2 class="head-3">Collection</h2>
                                    <p class="category"><span>New stylish shirts, pants &amp; Accessories</span></p>
                                    <p><a href="#" class="btn btn-primary">Shop Collection</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li style="background-image: url(images/img_bg_2.jpg);">
                <div class="overlay"></div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3 col-md-pull-2 col-sm-12 col-xs-12 slider-text">
                            <div class="slider-text-inner">
                                <div class="desc">
                                    <h1 class="head-1">Huge</h1>
                                    <h2 class="head-2">Sale</h2>
                                    <h2 class="head-3">45% off</h2>
                                    <p class="category"><span>New stylish shirts, pants &amp; Accessories</span></p>
                                    <p><a href="#" class="btn btn-primary">Shop Collection</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li style="background-image: url(images/img_bg_3.jpg);">
                <div class="overlay"></div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3 col-md-push-3 col-sm-12 col-xs-12 slider-text">
                            <div class="slider-text-inner">
                                <div class="desc">
                                    <h1 class="head-1">New</h1>
                                    <h2 class="head-2">Arrival</h2>
                                    <h2 class="head-3">up to 30% off</h2>
                                    <p class="category"><span>New stylish shirts, pants &amp; Accessories</span></p>
                                    <p><a href="#" class="btn btn-primary">Shop Collection</a></p>
                                </div>
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
            <div class="row">
                <div class="col-md-6 col-md-offset-3 text-center colorlib-heading">
                    <h2><span>Hàng mới về</span></h2>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Harum natus, repellat quasi illum in iusto ullam
                        itaque velit sit veniam mollitia quidem ut cupiditate aliquam amet labore recusandae aut nulla.</p>
                </div>
            </div>
            <div class="row">
                @each('frontend._inc.item-product', $productnews, 'product')
            </div>
        </div>
    </div>
    <div id="colorlib-intro" class="colorlib-intro" style="background-image: url(images/cover-img-1.jpg);"
     data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="intro-desc">
                        <div class="text-salebox">
                            <div class="text-lefts">
                                <div class="sale-box">
                                    <div class="sale-box-top">
                                        <h2 class="number">45</h2>
                                        <span class="sup-1">%</span>
                                        <span class="sup-2">Off</span>
                                    </div>
                                    <h2 class="text-sale">Sale</h2>
                                </div>
                            </div>
                            <div class="text-rights">
                                <h3 class="title">Just hurry up limited offer!</h3>
                                <p>Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
                                <p><a href="shop.html" class="btn btn-primary">Shop Now</a> <a href="#" class="btn btn-primary btn-outline">Read
                                        more</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="colorlib-shop">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 text-center colorlib-heading">
                    <h2><span>Sản phẩm mua nhiều nhất</span></h2>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iure, debitis? Eaque fugiat quisquam beatae sunt
                        similique obcaecati cupiditate saepe ab minus, praesentium velit inventore vitae repellat? Nisi repellendus sit
                        deserunt.</p>
                </div>
            </div>
            <div class="row">
                {{-- @each('fontend.components.item-product', $productsBuy, 'product') --}}
            </div>
        </div>
    </div>

    <div id="colorlib-testimony" class="colorlib-light-grey">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 text-center colorlib-heading">
                    <h2><span>Cảm nhận khách hàng</span></h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="owl-carousel2">
                        <div class="item">
                            <div class="testimony text-center">
                                <span class="img-user" style="background-image: url(images/person1.jpg);"></span>
                                <span class="user">Alysha Myers</span>
                                <small>Hà Nội, Việt Nam</small>
                                <blockquote>
                                    <p>" A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                                </blockquote>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony text-center">
                                <span class="img-user" style="background-image: url(images/person2.jpg);"></span>
                                <span class="user">James Fisher</span>
                                <small>Đà Nẵng, Việt Nam</small>
                                <blockquote>
                                    <p>One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World
                                        of Grammar.</p>
                                </blockquote>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony text-center">
                                <span class="img-user" style="background-image: url(images/person3.jpg);"></span>
                                <span class="user">Jacob Webb</span>
                                <small>Hà Nội, Việt Nam</small>
                                <blockquote>
                                    <p>Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her
                                        cheek, then she continued her way.</p>
                                </blockquote>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="colorlib-subscribe">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="col-md-6 text-center">
                        <h2><i class="icon-paperplane"></i>Đăng ký nhận bản tin</h2>
                    </div>
                    <div class="col-md-6">
                        <form class="form-inline qbstp-header-subscribe">
                            <div class="row">
                                <div class="col-md-12 col-md-offset-0">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="email" placeholder="Nhập email của bạn">
                                        <button type="submit" class="btn btn-primary">Đăng ký</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop