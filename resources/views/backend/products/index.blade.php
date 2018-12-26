@extends('layout.backend.master')

@section('title', 'List Products')

@section('main')
<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title">List Products </h4>
    </div>
    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        <ol class="breadcrumb">
        <li><a href="{{route('admin.products.index')}}">Dashboard</a></li>
            <li class="active">List Products</li>
        </ol>
    </div>

</div>
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default block1">
            <div class="panel-heading">
            <a href="{{route('admin.products.create')}}" class="btn btn-success" id="unblockbtn1"><i class="icon-plus"></i> Create</a>
            </div>
            <div class="panel-wrapper collapse in">
                <div class="panel-body">
                    <div class="table-responsive">
                        <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Product Name</th>
                                    <th>Thumbnail</th>
                                    <th>Sale Price</th>
                                    <th>Categories</th>
                                    <th>Create</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @each('backend.products._inc.item-table', $products, 'product')
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@stop