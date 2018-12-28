<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $productnews = Product::public()
            ->limit(8)
            ->orderBy('id', 'desc')
            ->get();

        return view('frontend.index', compact('productnews'));
    }

    public function productDetail(Request $request, $slug)
    {
        $product = Product::public()
            ->where('slug', $slug)
            ->firstOrFail();
        //lấy ID thuộc tính màu của sản phẩm
        $colors = $product->attr()->where('slug', 'color')->get();

        if ($colors->count() > 0) {
            $colorId = $colors->first()->id;
            // lấy danh sách màu đã tạo biến thể 
            $colors = $product
                ->skusvalues()
                ->where('attribute_id', $colorId)
                ->get()
                ->groupBy('value_id')->all();
        }
        
        $reviews = $product
                ->reviews()
                ->paginate(10);

        $userReviewStar = !is_null($request->user()) ? 
                $product
                ->reviews()
                ->where('user_id', $request->user()->id)
                ->get() : 0;

        if (!is_numeric($userReviewStar)) {
            $userReviewStar = $userReviewStar->first() ? $userReviewStar->first()->star :  0;
        }

        return view('frontend.product-detail', compact('product', 'colors', 'reviews', 'userReviewStar'));
    }
}
