<nav class="colorlib-nav" role="navigation">
        <div class="top-menu">
            <div class="container">
                <div class="row">
                    <div class="col-xs-2">
                        <div id="colorlib-logo"><a href="{{route('home')}}">Fashion</a></div>
                    </div>
                    <div class="col-xs-10 text-right menu-1">
                        <ul>
                            <li class="active"><a href="{{route('home')}}">Trang chủ</a></li>
                            <li class="has-dropdown">
                                <a href="">Cửa hàng</a>
                                <ul class="dropdown">
                                    <li><a href="">Giỏ hàng</a></li>
                                    <li><a href="">Thanh toán</a></li>
                                    <li><a href="add-to-wishlist.html">Danh sách yêu thích</a></li>
                                </ul>
                            </li>
                            <li><a href="blog.html">Tin tức</a></li>
                            <li><a href="about.html">Giới thiệu</a></li>
                            <li><a href="contact.html">Liên hệ</a></li>
                            <li><a href="{{route('carts.list')}}"><i class="icon-shopping-cart"></i> Giỏ hàng [{{$carts->count()}}]</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>