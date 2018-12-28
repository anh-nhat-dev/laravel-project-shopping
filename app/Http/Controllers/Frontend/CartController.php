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
}
