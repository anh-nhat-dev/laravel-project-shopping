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
        // dd($request->all());
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
}
