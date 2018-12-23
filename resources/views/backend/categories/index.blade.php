@extends('layout.backend.master')

@section('title', 'Danh sách danh mục')

@section('main')
<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title">List Categories </h4>
    </div>
    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        <ol class="breadcrumb">
            <li><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
            <li class="active">List Categories</li>
        </ol>
    </div>

</div>
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default block1">
            <div class="panel-heading">
            <a href="{{route('admin.categories.create')}}" class="btn btn-success" id="unblockbtn1"><i class="icon-plus"></i>
                    Create</a>
            </div>
            <div class="panel-wrapper collapse in">
                <div class="panel-body">
                    <div class="table-responsive">
                        <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Categories name</th>
                                    <th>Update</th>
                                    <th>Create</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @each('backend.categories._inc.item-table', $cates, 'cate')
                            </tbody>
                        </table>
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
        $('#example23').DataTable({
            dom: 'Bfrtip',
            buttons: [
               
            ],
            bSort: false
        });
    })
</script>
@stop