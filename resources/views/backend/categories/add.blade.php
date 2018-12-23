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
    <form class="form-horizontal" method="POST">
        <div class="col-md-9">
            <div class="white-box">
                <div class="form-group">
                    <label class="col-md-12">Name <span class="help text-danger">*</span></label>
                    <div class="col-md-12">
                        <input type="text" name="name" class="form-control" value=""> </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12">Parent <span class="help text-danger">*</span></label>
                    <div class="col-md-12">
                        <select class="selectpicker" name="parent" data-style="form-control">
        <option value="0">None</option>
                                    <option  value="1">Danh mục số 1</option>
                                    <option  value="4">Danh mục số 4</option>
                                    <option  value="2">--Danh mục con số 1</option>
                                    <option  value="3">--Danh mục số 2</option>
                            </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12">Mô tả danh mục<span class="help text-danger">*</span></label>
                    <div class="col-md-12">
                        <textarea id="mymce" name="description"></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading">Public</div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <button class="btn btn-info waves-effect waves-light" id="submit" type="submit"><span class="btn-label"><i
                class="ti-save"></i></span>Save</button>
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" name="_token" value="wep2oAUbE9NQRULOIHuCbTtyty79O2vfgHstd824"></form>
</div>
@stop
