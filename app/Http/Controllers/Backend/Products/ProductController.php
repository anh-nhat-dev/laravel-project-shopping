<?php

namespace App\Http\Controllers\Backend\Products;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Product;

use App\Http\Requests\Products\AddProductRequest;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(10);
        return view('backend.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.products.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddProductRequest $request)
    {
        $product = Product::create($request->all());

        event(new \App\Events\Products\ProductCreate($product));

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Thêm mới thành cồng');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('backend.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $product = Product::findOrFail($id);
        $product->update($request->all());

        $product->image()->updateOrCreate(
            ['type' => 'thumbnail', 'zone' => 'product'], 
            ['type' => 'thumbnail', 'zone' => 'product', 'link' => $request->thumbnail]
        );
        
        $gallerys = $request->gallery ?? [];
        $ids = [];
        foreach($gallerys as $image){
            $img = $product->images()->updateOrCreate(
            [   'type' => 'gallery', 
                'zone' => 'product',
                'id'   => $image['id'] ?? null
            ],
            [
                'type' => 'gallery',
                'zone' => 'product', 
                'link' => $image['link'],
            ]
        );
            $ids[] = $img->id;
        }
        $product->image()
            ->where('type','gallery')
            ->where('zone','product')
            ->whereNotIn('id',$ids)
            ->delete();

        event(new \App\Events\Products\ProductUpdate($product));

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        $product->attr->each(function($item){
            $item->values()->delete();
        }); 
        
        $product->skus()->each(function($item){
            $item->values()->delete();
        });
        $product->attr()->delete();
        $product->skus()->delete();

        $product->delete();

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Xóa thành công');
    }
}
