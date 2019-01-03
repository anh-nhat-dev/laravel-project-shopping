@extends('layout.backend.master')

@section('title', 'List Order')


@section('main')
<div class="row bg-title">
<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
    <h4 class="page-title">List Order </h4>
</div>
<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
    <ol class="breadcrumb">
        <li><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
        <li class="active">List Order</li>
    </ol>
</div>
</div>
<div class="row">
<div class="col-sm-12">
        <div class="panel panel-default block1">
            <div class="panel-wrapper collapse in">
                <div class="panel-body">
                    <div class="table-responsive">
                        <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>UserName</th>
                                    <th>Bill Info</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Create</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>#{{$order->id}}</td>
                                        <td>{{$order->user->fullname}}</td>
                                        <td class="text-left">
                                            <p>Name: {{$order->name}}</p>
                                            <p>Email: {{$order->email}}</p>
                                            <p>Phone: {{$order->phone}}</p>
                                            <p>Address: {{$order->adress}}</p>
                                        </td>
                                        <td>@money($order->total_price, 'VND')</td>
                                    <td>{{$order->status}}</td>
                                        <td>{{$order->created_at->format('d-m-Y')}}</td>
                                        <td>
                                            <a href="{{route('admin.orders.edit', $order->id)}}" class="btn btn-info "><i class="icon-pencil"></i>
                                            </a>
                                            <a href="" class="btn btn-danger"><i class="icon-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection