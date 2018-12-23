@extends('layout.backend.master')

@section('title', 'Thêm danh mục mới')

@section('main')
<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title">List Categories </h4>
    </div>
    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        <ol class="breadcrumb">
            <li><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
            <li><a href="{{route('admin.categories.index')}}">List Categories</a></li>
            <li class="active">Add Categories</li>
        </ol>
    </div>

</div>
<div class="row">
   @include('backend.categories._inc.form-add')
</div>
@stop
