<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Product;

class ShopController extends Controller
{
    public function reviews(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $data = array_merge($request->all(), ['product_id' => $id]);
        $review = $request
            ->user()
            ->reviews()
            ->updateOrCreate([
                'user_id' => $request->user()->user_id,
                'product_id' => $id
            ], $data);
        $avgReview = $product->reviews()->avg('star');
        $review->product()->update(['total_star' => $avgReview]);
        return redirect()
            ->route('product.detail', $product->slug);
    }

    public function index()
    {
        $cates = \App\Models\Category::all();
        $products = \App\Models\Product::public()->paginate(12);
        $maxPrice = \App\Models\Product::max('sale_price');
        $minPrice = \App\Models\Product::min('sale_price');

        $colors = \App\Models\ProductAttributeValue::whereHas('attr', function ($query) {
            $query->where('slug', 'color');
        })->get()
        ->mapWithKeys(function($item){
            return [$item['value'] => $item['options']];
        });

        $sizes = \App\Models\ProductAttributeValue::whereHas('attr', function ($query) {
            $query->where('slug', 'size');
        })->get()
        ->mapWithKeys(function($item){
            return [$item['value'] => $item['options']];
        });
        return view('frontend.shop', compact('products', 'cates', 'colors', 'sizes', 'maxPrice', 'minPrice'));
    }
}
