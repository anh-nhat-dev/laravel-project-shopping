@extends('layout.backend.master')

@section('title', "Edit Product")

@section('main')
<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title">{{$product->name}}</h4>
    </div>
    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        <ol class="breadcrumb">
            <li><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
            <li><a href="{{route('admin.products.index')}}">List Products</a></li>
            <li class="active">{{$product->name}}</li>
        </ol>
    </div>
</div>
<div class="row">
    @include('backend.products._inc.form-edit')
</div>
@stop
@section('script')

<script src="/vendor/laravel-filemanager/js/mfm.js"></script>
<script src="/vendor/laravel-filemanager/js/lfm.js"></script>
{{-- <script src="../plugins/bower_components/switchery/dist/switchery.min.js"></script>  --}}
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
    var JSONattributes =  @json($product->values()); // Danh sách giá trị thuộc tính
    var JSONskus = @json($product->skus); // Danh sách biến thể
    var JSONAtt = @json($product->attr);  // Danh sách thuộc tính

    var viewHTML = `{!!view('backend.products._inc.attribute-item')->render()!!}`; // HTML phần attribute
    var viewSku = `{!!view('backend.products._inc.sku-item')->render()!!}`; // HTML phần Giá trị biến thể
    var viewVar = `{!!view('backend.products._inc.var-item')->render()!!}`; // HTML phần liên kết biến thể

    /**
    *  Các hàm cập nhật view
    **/

    // Cập nhật view Tab Attribute

    function loadView()
    {
        var htmlAttributes = "";
        JSONattributes.map(function(item, index){
            htmlAttributes += showViewAttribute(item,index);
        })
        $('#attributes').html(htmlAttributes)
    }
    // Cập nhật view Tab Variant
    function loadViewSku()
    {
        var htmlSkus = "";
        JSONskus.map(function(item, index){
            htmlSkus += showViewSku(item,index);
        })
        $('#skus').html(htmlSkus)
    }
    /** 
    * Các hàm Xử lý sự kiện
    **/
    // Xử lý sự kiện thay đổi Select 
    var changeValues = function(index, ind,value,type){
        JSONskus[index]['values'][ind][type] = value;
        loadViewSku()
    }

    // Xử lý sự kiện Chỉnh sửa Thuộc tính
    var editInput = function(index, name, value) {
        JSONattributes[index][name] = value;
    }
    
    //Xư lý sự kiện click Liên kết biến thể
    var addVarSku = function(index)
    {
        JSONskus[index]['values'] = JSONskus[index]['values'] || [];
        if (JSONskus[index]['values'].length >= JSONAtt.length) return
        JSONskus[index]['values'].push({
            attribute_id: 0,
            value_id: 0
        })
        loadViewSku()
    }

    // Xử lý sự kiện thay đổi giá trị ở biến thể
    var editInputSku = function(index, name, value) {
        JSONskus[index][name] = value;
    }

    
    /** 
    * Các hàm hiện thị nộị dung Input
    **/

    // Hiện thị các ô input ở phần Attribute 
    var showViewAttribute = function (item,index)
    {
        let htmlItem = $(viewHTML)
        htmlItem.find('input').eq(0).attr('name', `attributes[${index}][name]`).attr('value', item.name).attr('onBlur', `editInput(${index},'name',this.value)`)
        htmlItem.find('input').eq(1).attr('name', `attributes[${index}][value]`).attr('value', item.value).attr('onBlur', `editInput(${index},'value',this.value)`)
        htmlItem.find('input').eq(2).attr('name', `attributes[${index}][options]`).attr('value', item.options).attr('onBlur', `editInput(${index},'options',this.value)`)
        htmlItem.find('input').eq(3).attr('name', `attributes[${index}][id]`).attr('value', item.id || '')
        return htmlItem[0].outerHTML
    }
    // Hiện thị ô input ở phần Variants
    var showViewSku = function(item, index){
        let htmlItem = $(viewSku)
        
        htmlItem.find('input').eq(0).attr('name', `skus[${index}][price]`).attr('value', item.price).attr('onBlur', `editInputSku(${index},'price',this.value)`)
        htmlItem.find('input').eq(1).attr('name', `skus[${index}][sale_price]`).attr('value', item.sale_price).attr('onBlur', `editInputSku(${index},'sale_price',this.value)`)
        htmlItem.find('input').eq(2).attr('name', `skus[${index}][quantity]`).attr('value', item.quantity).attr('onBlur', `editInputSku(${index},'quantity',this.value)`)
        htmlItem.find('input').eq(3).attr('name', `skus[${index}][id]`).attr('value', item.id || '')
        htmlItem.find('button').eq(0).attr('onClick', `addVarSku(${index})`);
        
        let parent = htmlItem.children().eq(4).attr('id', `option-${index}`)
            if(typeof item.values !== 'undefined'){
            item.values.forEach(function(el,ind){
                let htmlVar = $(viewVar)
                let optionAtt = optionValue = "";
                JSONAtt.forEach(function(element, attin){
                console.log(element)
                    let type = item.values.find(x => x.attribute_id == element.id)
                    if (typeof type === "undefined") {
                        optionAtt += `<option value="${element.id}">${element.name}</option>`;
                    }
                    if ((typeof type === "object") && (element.id === parseInt(el.attribute_id))) {
                        optionAtt += `<option selected value="${element.id}">${element.name}</option>`;
                        element.values.forEach(function(elm, elmin){
                            if (elm.id == el.value_id){
                                optionValue += `<option selected value="${elm.id}">${elm.value}</option>`;
                            } else {
                                optionValue += `<option  value="${elm.id}">${elm.value}</option>`;
                            }
                        })
                    }
                })
                htmlVar.find('select').eq(0).append(optionAtt).attr('onBlur', `changeValues(${index},${ind},this.value, 'attribute_id')`).attr('name', `skus[${index}][values][${ind}][attribute_id]`)
                htmlVar.find('select').eq(1).append(optionValue).attr('onBlur', `changeValues(${index},${ind},this.value, 'value_id')`).attr('name', `skus[${index}][values][${ind}][value_id]`)
                parent.append(htmlVar);
            })
        }
        return htmlItem[0].outerHTML
    }

    // Xóa ảnh
    function deleteImage (item){
        $(item).parentsUntil('#imgGallery').remove()
        return false;
    }

    jQuery(document).ready(function(){
        //Xử lý sự kiện click vào tạo thuộc tính
        $('#createattribute').click(function(e){
            e.preventDefault()
            JSONattributes.push({
                name: '',
                value: '',
                options: ''
            });
            loadView();
        });
        // Xử lý sự kiện click vào tạo biến thể
        $('#createsku').click(function(e){
            e.preventDefault();
            let count = JSONAtt.reduce((amo,cur) => cur.values.length * amo,1)
            if (count <= JSONskus.length) return 
            JSONskus.push({
                price: 0,
                quantity: 0,
                sale_price:0
            });
            loadViewSku();
        })

        // Load dữ liệu cũ
        loadView()
        loadViewSku();
        $('#lfm').filemanager('file');
        $('#gallery').filemanagerMulti('file');
        // $('[rel="deleteImage"]').click(function(e){
        //     e.preventDefault();
        // })
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
