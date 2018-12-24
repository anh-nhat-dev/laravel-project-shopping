@extends('layout.backend.master')

@section('title', 'Add products')

@section('main')
<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title">Add Products </h4>
    </div>
    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        <ol class="breadcrumb">
            <li><a href="http://localhost:8000/admin">Dashboard</a></li>
            <li class="active">Add Products</li>
        </ol>
    </div>

</div>
<div class="row">
    <form action={{route('admin.products.store')}} class="form-horizontal" method="POST">
        <div class="col-md-9">
            <!-- Tabstyle start -->
            <section>
                <div class="sttabs tabs-style-bar">
                    <nav>
                        <ul>
                            <li><a href="#section-bar-1" class="sticon ti-layout-menu-v"><span>Details</span></a></li>
                            <li><a href="#section-bar-2" class="sticon icon-tag"><span>Attributes</span></a></li>
                        </ul>
                    </nav>
                    <div class="content-wrap">
                        <section style="padding: 1px 2px" id="section-bar-1">
                            <div class="white-box">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label>Tên sản phẩm <span class="help text-danger">*</span></label>
                                        <div>
                                            <input type="text" class="form-control" name="name" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Mô tả sản phẩm <span class="help text-danger">*</span></label>
                                    <div class="col-md-12">
                                        <textarea id="mymce" name="description"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    price
                                </div>
                                <div class="panel-wrapper collapse in">
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <label class="col-md-12">Is Sale</label>
                                            <div class="col-md-12">
                                                <input type="checkbox" name="is_sale" value="true" class="js-switch"
                                                    data-color="#36c6d3" data-size="small" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group m-r-20">
                                                <label>Regular Price <span class="help text-danger">*</span></label>
                                                <div>
                                                    <input name="price" type="number" class="form-control"
                                                        value="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Sale Price <span class="help text-danger">*</span></label>
                                                <div>
                                                    <input name="sale_price" type="number" class="form-control" value="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group m-r-20">
                                                <label>Quantity <span class="help text-danger">*</span></label>
                                                <div>
                                                    <input name="quantity" type="number" class="form-control" value="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Gellery
                                    <div class="input-group pull-right" style="display: inline-block">
                                        <span class="input-group-btn " style="display: inline-block">
                                            <a id="gallery" data-result="imgGallery" class="btn btn-primary">
                                                <i class="fa fa-picture-o"></i> Choose
                                            </a>
                                        </span>
                                    </div>
                                </div>
                                <div class="panel-wrapper collapse in">
                                    <div class="panel-body">
                                        <div class="m-t-20 row">
                                            <div id="imgGallery">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <section style="padding: 1px 2px" id="section-bar-2">
                            <div class="white-box">
                                <div class="row">
                                    <div class="col-md-12">
                                        <a id="createattribute" class="btn btn-success" id="unblockbtn1"><i class="icon-plus"></i>
                                            Create Attribute</a>
                                    </div>
                                </div>
                            </div>
                            <div class="white-box" id="attributes">

                            </div>
                        </section>
                    </div>
                    <!-- /content -->
                </div>
                <!-- /tabs -->
            </section>
            <!-- Tabstyle start -->
        </div>
        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading">Public</div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                            <div class="form-group">
                                <label class="col-md-12">Is Future</label>
                                <div class="col-md-12">
                                    <input type="checkbox" name="is_future" value="true" class="js-switch" data-color="#36c6d3" data-size="small" />
                                </div>
                            </div>
                        <button class="btn btn-info waves-effect waves-light" type="submit"><span class="btn-label"><i
                                    class="ti-save"></i></span>Save</button>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Status</div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <select name="status" class="selectpicker" data-style="form-control">
                            <option value="public">Public</option>
                            <option value="draff">Draff</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Categories</div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <select class="selectpicker" name="categories_id" data-style="form-control">
                            @foreach ($cates as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Thumbnail</div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="input-group">
                            <span class="input-group-btn">
                                <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                    <i class="fa fa-picture-o"></i> Choose
                                </a>
                            </span>
                            <input id="thumbnail" class="form-control" value=" " type="hidden" name="thumbnail">
                        </div>
                        <div class="item-img" style="background: url() no-repeat center; background-size: cover">
                            <button class="item-img-delete"><i class="fa fa-trash-o"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <style>
            .item-img {
                width: 150px;
                height: 150px;
                display: inline-block;
                margin-right: 15px;
                border: 1px solid #ddd;
                padding: 15px;
                background-size: cover;
                position: relative;
                margin-top: 15px;
            }

            .item-img-delete {
                position: absolute;
                top: -10px;
                right: -10px;
                color: red;
                background: #fff;
                border: 1px solid #ddd;
                border-radius: 50%;
            }
        </style>
        @csrf
    </form>
</div>
@stop

@section('script')
<script src="js/cbpFWTabs.js"></script>
<script src="../plugins/bower_components/custom-select/custom-select.min.js" type="text/javascript"></script>
<script src="../plugins/bower_components/bootstrap-select/bootstrap-select.min.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/gijgo@1.9.10/js/gijgo.min.js" type="text/javascript"></script>
<script src="../plugins/bower_components/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
    (function () {
        [].slice.call(document.querySelectorAll('.sttabs')).forEach(function (el) {
            new CBPFWTabs(el);
        });
    })();

</script>
<script>
    jQuery(document).ready(function () {
            if ($("#mymce").length > 0) {
                tinymce.init({
                    selector: "textarea#mymce",
                    theme: "modern",
                    height: 300,
                    plugins: [
                        "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker", "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking", "save table contextmenu directionality emoticons template paste textcolor"
                    ],
                    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
                });
            }
            $('.selectpicker').selectpicker();
        });
</script>

<script>
var viewHTML = `{!!view('backend.products._inc.attribute-item')->render()!!}`;
var JSONattributes = @json([]);
function loadView()
{
    var htmlAttributes = "";
    JSONattributes.map(function(item, index){
        htmlAttributes += showViewAttribute(item,index);
    })
    $('#attributes').html(htmlAttributes)
}
var editInput = function(index, name, value) {
            JSONattributes[index][name] = value;
        }
var showViewAttribute = function (item,index)
    {
        let htmlItem = $(viewHTML)
        htmlItem.find('input').eq(0).attr('name', `attributes[${index}][name]`).attr('value', item.name).attr('onBlur', `editInput(${index},'name',this.value)`)
        htmlItem.find('input').eq(1).attr('name', `attributes[${index}][value]`).attr('value', item.value).attr('onBlur', `editInput(${index},'value',this.value)`)
        htmlItem.find('input').eq(2).attr('name', `attributes[${index}][options]`).attr('value', item.options).attr('onBlur', `editInput(${index},'options',this.value)`)
        return htmlItem[0].outerHTML
    }

jQuery(document).ready(function () {
    $('#createattribute').click(function(e){
        e.preventDefault()
        JSONattributes.push({
            name: '',
            value: '',
            options: ''
        });
        loadView()
    });
})
</script>
@stop
@section('style')
<link href="../plugins/bower_components/summernote/dist/summernote.css" rel="stylesheet" />
<!-- Menu CSS -->
<link href="../plugins/bower_components/switchery/dist/switchery.min.css" rel="stylesheet" />
<link href="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
<link href="../plugins/bower_components/custom-select/custom-select.css" rel="stylesheet" type="text/css" />
<link href="../plugins/bower_components/switchery/dist/switchery.min.css" rel="stylesheet" />
<link href="../plugins/bower_components/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />

@stop
