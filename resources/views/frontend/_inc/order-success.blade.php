
<div class="row mt-50">
    <div class="col-md-4">
        <h3 class="billing-title mt-20 pl-15">Thông tin đơn hàng</h3>
        <table class="order-rable">
            <tbody>
                <tr>
                    <td>Đơn hàng số</td>
                    <td>: {{$order->order_id}}</td>
                </tr>
                <tr>
                    <td>Ngày mua</td>
                    <td>: {{$order->created_at->format('d/m/Y')}}</td>
                </tr>
                <tr>
                    <td>Tổng tiền</td>
                    <td>: @money($order->total_price, 'VND')</td>
                </tr>
                <tr>
                    <td>Phương thức thanh toán</td>
                    <td>:{{ ($order->payment_method == 'transfer_bank' ? 'Chuyển khoản qua ngân hàng' : 'Thanh toán khi nhận hàng' )}}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="col-md-4">
        <h3 class="billing-title mt-20 pl-15">Thông tin đơn hàng</h3>
        <table class="order-rable">
            <tbody>
                <tr>
                    <td>Họ Tên</td>
                    <td>: {{$order->name}}</td>
                </tr>
                <tr>
                    <td>Số điện thoại</td>
                    <td>: {{$order->phone}}</td>
                </tr>
                <tr>
                    <td>Địa chỉ</td>
                    <td>: {{$order->address}} </td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>: {{$order->email}}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<div class="billing-form">
    <div class="row">
        <div class="col-12">
            <div class="order-wrapper mt-50">
                <h3 class="billing-title mb-10">Hóa đơn</h3>
                <div class="order-list">

                    <div class="list-row d-flex justify-content-between">
                        <div>Sản phẩm</div>
                        <div>Tổng cộng</div>
                    </div>
                    @foreach ($order->details as $item)
                        <div class="list-row d-flex justify-content-between">
                            <div>{{$item->product->name}} 
                                @if(!is_null($item->sku))
                                    @foreach ($item->sku->values as $value)
                                    -{{$value->value->value}}
                                    @endforeach
                                @endif
                            </div>
                            <div>x {{$item->quantity}}</div>
                            <div>@money($item->quantity * $item->price, 'VND')</div>
                        </div>
                    @endforeach
                
                    {{-- <div class="list-row border-bottom-0 d-flex justify-content-between">
                        <h6>Total</h6>
                        <div class="total">@money($item->total, 'VND')</div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>