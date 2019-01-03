@extends('layout.backend.master')
@section('main')
<div class="col-md-12">
        <div class="white-box">
            <h3><b>INVOICE</b> <span class="pull-right">#{{$order->order_id}}</span></h3>
            <hr>
            <form class="row" action="{{route('admin.orders.update', $order->id)}}" method="POST">
                <div class="col-md-12">
                    <div class="pull-left">
                        <address>
                            <h3> &nbsp;<b class="text-danger">Bill Info</b></h3>
                            <p class="text-muted m-l-5">Name: {{$order->name}}</p>
                            <p class="text-muted m-l-5">Phone: {{$order->phone}}</p>
                            <p class="text-muted m-l-5">Address: {{$order->adress}} </p>
                            <p class="text-muted m-l-5">Email: {{$order->email}}</p>
                            <p class="text-muted m-l-5">Payment Method: {{($order->payment_method == 'transfer_bank') ? 'Chuyển khoản' : null}} {{$order->payment_method == 'direct_payment' ? 'Thanh toán khi nhận hàng' : null}}</p>
                        </address>
                    </div>
                    <div class="pull-right text-right">
                        <address>
                            <h3>Status, {{$order->status}}</h3>
                            
                            <div class="form-group row">

                                <div class="col-md-12">
                                    <select class="selectpicker" name="status"  data-style="form-control">
                                        <option @if($order->status == 'pending') selected @endif  @if($order->status != 'pending') disabled @endif value="completed">Pending</option>
                                        <option @if($order->status == 'shipping') selected @endif  @if($order->status != 'pending') disabled @endif value="processing">Shipping</option>
                                        <option @if($order->status == 'complated') selected @endif @if($order->status == 'cancled')disabled @endif value="complated">Complate</option>
                                        <option @if($order->status == 'cancled') selected @endif @if($order->status == 'complated') disabled @endif value="cancled">Cancle</option>
                                        
                                    </select>
                                </div>
                            </div>
                         
                            <p class="m-t-30"><b>Create :</b> <i class="fa fa-calendar"></i>{{$order->created_at->format('d-m-Y')}}</p>
                            <p><b>Update :</b> <i class="fa fa-calendar"></i> {{$order->updated_at->format('d-m-Y')}}</p>
                        </address>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="table-responsive m-t-40">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>Description</th>
                                    <th class="text-right">Quantity</th>
                                    <th class="text-right">Unit Cost</th>
                                    <th class="text-right">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order->details as $key => $item)
                                <tr>
                                        <td class="text-center">{{$key}}</td>
                                        <td>{{$item->product->name}}
                                                @if(isset($item->sku->values))
                                                    @foreach ($item->sku->values as $value)
                                                    -{{$value->value->value}}
                                                    @endforeach
                                                @endif</td>
                                        <td class="text-right">{{$item->quantity}}</td>
                                        <td class="text-right"> @money($item->price, 'VND') </td>
                                        <td class="text-right">  @money($item->price * $item->quantity, 'VND') </td>
                                    </tr>
                                @endforeach
                            
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="pull-right m-t-30 text-right">
                      
                        <h3><b>Total :</b> @money($order->total_price, 'VND')</h3>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="text-right">
                        <button onClick="javascript:window.print();" class="btn btn-default btn-outline"
                            type="button"> <span><i class="fa fa-print"></i> Print</span> </button>
                    </div>
                </div>
                @csrf
                <input type="hidden" name="_method" value="PUT" />
            </form>
        </div>
    </div>
@stop

@section('style')
<link href="../plugins/bower_components/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
@stop
@section('script')
        <script src="../plugins/bower_components/bootstrap-select/bootstrap-select.min.js" type="text/javascript"></script>
        <script>
            $(document).ready(function(){
                $('[name="status"]').change(function(e){
                    $(this).parentsUntil('tbody').submit();
                });
            })
        </script>
@stop
    