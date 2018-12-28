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
                                <h1>{{$product->name}}</h1>
                                <h2 class="bread">
                                    <span><a href="{{route('home')}}">Trang chủ</a></span>
                                    <span><a href="{{route('shop')}}">Cửa hàng</a></span>
                                    <span>{{$product->name}}</span></h2>
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
        @include('frontend._inc.form-addcart')
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="row">
                    <div class="col-md-12 tabulation">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#description">Mô tả</a></li>
                            <li><a data-toggle="tab" href="#manufacturer">Thuộc tính sản phẩm</a></li>
                            <li><a data-toggle="tab" href="#review">Đánh giá</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="description" class="tab-pane fade in active">
                                {!!$product->description!!}
                            </div>
                            <div id="manufacturer" class="tab-pane fade">
                                @foreach ($product->attr as $attr)
                                <p><b>{{$attr->name}}</b>: @foreach ($attr->values as $value) {{$value->value}},
                                    @endforeach</p>
                                @endforeach
                            </div>
                            <div id="review" class="tab-pane fade">
                                <div class="row">
                                    <div class="col-md-7">
                                        <h3>{{$reviews->total()}} Reviews</h3>
                                        @foreach($reviews as $review)
                                        <div class="review">
                                            <div class="user-img" style="background-image: url(images/person2.jpg)"></div>
                                            <div class="desc">
                                                <h4>
                                                    <span class="text-left">{{$review->user->fullname}}</span>
                                                    <span class="text-right">{{$review->created_at->format('d-m-Y')}}</span>
                                                </h4>
                                                <p class="star">
                                                    <span>
                                                        @for($i = 1; $i <= 5 ; $i++) @if($i <=$review->star)
                                                            <i class="icon-star-full"></i>
                                                            @else
                                                            <i class="icon-star-empty"></i>
                                                            @endif
                                                            @endfor
                                                    </span>
                                                </p>
                                                <p>{{$review->review_comment}}</p>
                                            </div>
                                        </div>
                                        @endforeach
                                        {{ $reviews->links() }}
                                    </div>
                                    <div class="col-md-4 col-md-push-1">
                                        <div class="rating-wrap">
                                            <h3>Give a Review</h3>
                                            @for($i = 5; $i >= 1; $i--)
                                            <p class="star">
                                                <span>
                                                    @for($j = 1; $j <= 5 ; $j++) @if($j <=$i) <i class="icon-star-full"></i>
                                                        @else
                                                        <i class="icon-star-empty"></i>
                                                        @endif
                                                        @endfor
                                                        ({{ $product->reviews()->count() ?
                                                        FLOOR(($product->reviews()->where('star',
                                                        $i)->count()/$product->reviews()->count())*100) : 0}}%)
                                                </span>
                                                <span>{{$product->reviews()->where('star', $i)->count()}}
                                                    Reviews</span>
                                            </p>
                                            @endfor
                                        </div>
                                    </div>
                                    @if(!Auth::guest())
                                    <form method="post" action="{{route('reviews', $product->id)}}" class="col-md-12"
                                        id="reviews">
                                        <h3>Add a Review</h3>
                                        <div>
                                            <h5>Your Rating: </h5>
                                            <p class="star">
                                                <span id="{{$userReviewStar > 0 ? null : 'ratings'}}">
                                                    @for($i = 1; $i <= 5 ; $i++) 
                                                        @if($i <=$userReviewStar) 
                                                            <i class="icon-star-full"></i>
                                                        @else
                                                        <i class="icon-star-empty"></i>
                                                        @endif
                                                    @endfor
                                                </span>
                                                <p id="result"></p>
                                                <input type="hidden" id="star" name="star">
                                            </p>
                                        </div>
                                        @if (!($userReviewStar > 0))
                                        <div class="form-group">
                                            <textarea name="comment" class="form-control" rows="5">Content</textarea>
                                        </div>
                                        @csrf
                                        <div class="form-group">
                                            <button type="submit" class=" btn btn-default">Send Review</button>
                                        </div>
                                        @endif
                                    </form>
                                    @else
                                    <div class="col-md-12">
                                        Vui lòng <a href="{{route('login')}}">đăng nhập</a> để gửi đánh giá
                                    </div>

                                    @endif
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
@section('script')
<script>
    $(document).ready(function () {
        addCart()
        $('#ratings i').mouseenter(function(){
                $(this).removeClass('icon-star-empty').addClass('icon-star-full')
                $(this).prevAll().removeClass('icon-star-empty').addClass('icon-star-full')
                $(this).nextAll().removeClass('icon-star-full').addClass('icon-star-empty')
                let star = $(this).prevAll().length + 1;
                $('#result').html(`You have ratings ${star} star`)
            }).mouseleave(function(){
                let star = $(this).prevAll().length + 1;
                
                $('#star').val(star)
            })
    })

</script>
@stop
@section('style')
<style>
    #reviews .form-control {
        border: 1px solid rgba(0, 0, 0, 0.1) !important;
    }

    .desc .active {
        border: 1px solid red !important;
    }

</style>
@stop
