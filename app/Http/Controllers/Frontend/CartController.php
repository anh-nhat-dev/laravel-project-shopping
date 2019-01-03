<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\{Product, Cart};


class CartController extends Controller
{
    public function addToCart(Request $request)
    {   
        //Tìm sản phẩm
        $product = Product::findOrFail($request->product_id);

        //Tìm biến thể
        $sku = $product
            ->skus()
            ->find($request->sku_id);
        
        $cartData = [
            'user_id' => $request->user()->id ?? null,
            'product_id' => $request->product_id,
            'sku_id' => $sku->id ?? null,
            'price' => !is_null($sku) ? $sku->sale_price : $product->sale_price,
            'quantity' => $request->quantity,
            'session_id' => $request->session()->getId()
        ];

        $cart = Cart::updateOrCreate(
            ['sku_id' => $sku->id ?? null,'product_id' => $product->id, 'session_id' => $request->session()->getId()],
             $cartData);

             return redirect()
            ->route('product.detail', $product->slug)
            ->with('success', 'Sản phẩm đã được thêm vào giỏ hàng');
    }

    public function index()
    {
        $totalPrice = 0;
        $totalSale = 0;
        return view('frontend.carts', compact('totalPrice', 'totalSale'));
    }

    public function checkout()
    {
        $totalPrice = 0;
        return view('frontend.checkout', compact('totalPrice'));
    }

    public function order(\App\Http\Requests\Order\AddOrderRequest $request)
    {

        $bill = $request->all();

        $user_id = $request->user()->id;
        
        $carts = Cart::where('user_id', $user_id)->get();
  
        $totalPrice = $carts->reduce(function($carry,$item ){
            return  ($item->price * $item->quantity) + $carry;
        }, 0);

        $order = [
            'total_price' => $totalPrice
        ];

        $data = array_merge($bill, $order);
        $order = $request->user()->orders()->create($data);

        $carts->each(function ($item) use ($order){
            $total = ($item->price * $item->quantity);
            $cart = array_merge($item->toArray(), ['total_price' =>$total ]);
            $order->details()->create($cart);
            $item->delete();
        });

        return redirect()
            ->route('carts.success')
            ->with(['order' => $order]);
    }

    public function checkoutSuccess()
    {
        $order = session('order');
        return view('frontend.complate', compact('order'));
    }
}
