@extends('layout.fontend.master')
@section('style')
    <style>
        .b-active {
            border: 2px solid red!important;
        }
        .a-active {
            color: red !important;
            font-weight: bold;
        }
    </style>
@stop

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
                                <h1>Cửa hàng</h1>
                            <h2 class="bread"><span><a href="{{route('home')}}">Trang chủ</a></span> <span>Cửa hàng</span></h2>
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
            <div id="products" class="col-md-9 col-md-push-3">
                @include('frontend._inc.shop-product')
            </div>
            <div class="col-md-3 col-md-pull-9">
                <div class="sidebar">
                    <div class="side">
                        <h2>Danh mục</h2>

                        <div class="fancy-collapse-panel">
                            <div class="panel-group" id="catefilter" role="tablist" aria-multiselectable="true">
                                @menuFont($cates)
                            </div>
                        </div>
                    </div>
                    <div class="side">
                        <h2>Khoảng giá</h2>
                        <form method="post" class="colorlib-form-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="guests">Từ:</label>
                                        <div class="form-field">
                                            <i class="icon icon-arrow-down3"></i>
                                            <select  name="people" id="minprice" class="form-control">
                                                @for ($i = 1; $i <= 5; $i++)
                                                <option value="{{$minPrice * $i}}">@money($minPrice * $i, 'VND')</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="guests">Đến:</label>
                                        <div class="form-field">
                                            <i class="icon icon-arrow-down3"></i>
                                            <select name="people" id="maxprice" class="form-control">
                                                @for ($i = 5; $i >= 1; $i--)
                                                    <option value="{{$maxPrice / $i}}">@money($maxPrice / $i, 'VND')</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="side">
                        <h2>Màu sắc</h2>
                        <div class="color-wrap">
                            <p class="color-desc" id="colors">
                                @foreach ($colors as $key => $color)
                                <a href="#" data-color="{{$key}}" style="background-color: {{$color}}" class="color"></a>
                                @endforeach
                            </p>
                        </div>
                    </div>
                    <div class="side">
                        <h2>Kích thước</h2>
                        <div class="size-wrap">
                            <p class="size-desc" id="sizes">
                                @foreach ($sizes as $key => $size)
                                <a href="#" data-size="{{$key}}" class="size">{{$key}}</a>
                                @endforeach
                            </p>
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

        
        var data = {}

        

        function ajaxLoader(url)
        {
            $.ajax({
                url: '{{route('ajax.shop')}}',
                type: 'GET',
                data: data
            })
            .done(function(data){
                $('#products').html(data.content)
            })
        }
        function gotoPage(e)
        {

            let params = (new URL($(e).attr('href'))).searchParams;
            let page = params.get("page");
            data['page'] = page;
            ajaxLoader();
            return false;
        }
        $(document).ready(function(){
            var catefilter = $('#catefilter').find('a')
            var minprice = $('#minprice')
            var maxprice = $('#maxprice')
            var colors = $('#colors').find('a')
            var sizes = $('#sizes').find('a')
            if(sizes.length > 0) {
                sizes.each(function(index, item){
                    $(item).click(function(e){
                        e.preventDefault();
                        $('#sizes').find('a.b-active').eq(0).removeClass('b-active')
                        $(this).addClass('b-active')
                        data['size'] = $(this).data('size')
                        ajaxLoader()
                    });
                })
            }
            if(colors.length > 0) {
                colors.each(function(index, item){
                    $(item).click(function(e){
                        e.preventDefault();
                        $('#colors').find('a.b-active').eq(0).removeClass('b-active');
                        $(this).addClass('b-active')
                        data['color'] = $(this).data('color')
                        ajaxLoader()
                    });
                })
            }

            if (catefilter.length > 0) {
                catefilter.each(function(index, item){
                    $(item).click(function(e){
                        $('#catefilter').find('a.a-active').eq(0).removeClass('a-active')
                        e.preventDefault();
                        $(this).addClass('a-active')
                        data['category_id'] = $(this).data('id')
                        ajaxLoader()
                    });
                })
            }
            minprice.change(function(e){
                data['min'] = $(this).val()
                data['max'] = maxprice.val()
                ajaxLoader()
            })
            maxprice.change(function(e){
                data['max'] = $(this).val()
                data['min'] = minprice.val()
                ajaxLoader()
            })

        })
    </script>
@stop