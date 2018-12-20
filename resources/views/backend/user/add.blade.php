@extends('layout.backend.master')

@section('title', 'Cập nhật thành viên')

@section('main')
<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title">Thêm thành viên </h4>
    </div>
    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        <ol class="breadcrumb">
        <li><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
        <li><a href="{{route('admin.users.index')}}">Danh sách thành viên</a></li>
            <li class="active">Thêm thành viên</li>
        </ol>
    </div>

</div>
<div class="row">
    <form action="{{route('admin.users.store')}}" class="form-horizontal form-material" method="POST">
        @include('backend.user._inc.form-add')
    </form>
</div>
@stop
