<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['products'] = Product::All();
        return view('backend.product.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data ['cats'] = Category::All();
        return view('backend.product.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'img' => $request->img,
            'category_id' => $request->category,
        ];
        print_r($data);
        if(Product::insert($data)){
            return redirect('products')->with('msg','Successfully Product Added');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['cats'] = Category::all();
        $data['product'] = Product::find($id);
    
        if (!$data['product']) {
            return redirect('products')->with('error', 'Product not found');
        }
    
        return view('backend.product.edit', $data);
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::find($id);

    if (!$product) {
        return redirect('products')->with('error', 'Product not found');
    }

    $data = [
        'name' => $request->name,
        'price' => $request->price,
        'img' => $request->img,
        'description' => $request->description,
        'category_id' => $request->category,
    ];

    if ($product->update($data)) {
        return redirect('products')->with('msg', 'Product Updated');
    } else {
        return redirect('products')->with('error', 'Failed to update Product');
    }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect('products')->with('msg','Deleted Successfully');
    }
}
