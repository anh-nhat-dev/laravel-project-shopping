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
}
