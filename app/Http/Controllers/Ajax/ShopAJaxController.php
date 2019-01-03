<?php

namespace App\Http\Controllers\Ajax;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;

class ShopAJaxController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::public()
            ->cates($request->category_id)
            ->rangerprice($request->min, $request->max)
            ->color($request->color)
            ->size($request->size)
            ->paginate(12);

        $view = view('frontend._inc.shop-product', compact('products'))->render();

        return response()->json(['content' => $view], 200);
    }

    public function addToCart(Request $request)
    {
        
        $product = Product::findOrFail($request->id);
        
        $colors = $product
                ->skusvalues()
                ->where('attribute_id', 1)
                ->get()
                ->groupBy('value_id')->all();
        $sizes = $product
                ->skusvalues()
                ->where('attribute_id', 2)
                ->get()
                ->groupBy('value_id')->all();
        $view = view()->make('frontend.ajax.product', compact('product', 'colors', 'sizes'))->render();
        return response()->json(['content' => $view], 200);
    }

}
