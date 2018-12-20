@extends('layout.backend.master')

@section('title', 'Quản lý thành viên')

@section('main')
<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title">Danh sách thành viên </h4>
    </div>
    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        <ol class="breadcrumb">
            <li><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
            <li class="active">Danh sách thành viên</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default block1">
            <div class="panel-heading">
            <a href="{{route('admin.users.create')}}" class="btn btn-success" id="unblockbtn1"><i class="icon-plus"></i>
                    Create</a>
            </div>
            <div class="panel-wrapper collapse in">
                <div class="panel-body">
                    <div class="table-responsive">
                        <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Fullname</th>
                                    <th>Thumbnail</th>
                                    <th>Email</th>
                                    <th>Create</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @each('backend.user._inc.table-item', $users, 'user')
                            </tbody>
                        </table>
                    </div>
                    
                    {{$users->links()}}
                </div>
            </div>

        </div>
    </div>
</div>
@stop
