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
    @include('backend.products._inc.form-add')
</div>
@stop

@section('script')
<script src="/vendor/laravel-filemanager/js/mfm.js"></script>
<script src="/vendor/laravel-filemanager/js/lfm.js"></script>
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
function deleteImage (item){
    $(item).parentsUntil('#imgGallery').remove()
    return false;
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

    $('#lfm').filemanager('file');
        $('#gallery').filemanagerMulti('file');
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
