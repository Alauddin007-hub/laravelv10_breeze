<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['cats'] = Category::All();
        return view('backend.category.index', $data);
        //  return view('backend.category.index');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view('backend.category.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $data = [ 'name' => $request->name];
    //    if(category::insert($data)){
    //         return redirect('category')->with('msg','Successfully Category Added');
    //    }
       DB::table('categories')->insert($data);
       return redirect('category')->with('msg','Successfully Category Added');
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
        $data['cat'] = Category::find($id);
        return view('backend.category.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, string $id)
    // {
    //     $category = category::find($id);
    
    //     if (!$category) {
    //         return redirect('category/edit/{id}')->with('error', 'Category not found');
    //     }
    
    //     $data = ['name' => $request->name];
    
    //     if ($category->update($data)) {
    //         return redirect('category')->with('msg', 'Category Updated');
    //     } else {
    //         return redirect('category')->with('error', 'Failed to update category');
    //     }
    // }

    public function update(Request $request, string $id)
{
    $category = Category::find($id);

    if (!$category) {
        return redirect('category')->with('error', 'Category not found');
    }

    $data = ['name' => $request->name];

    if ($category->update($data)) {
        return redirect('category')->with('msg', 'Category Updated');
    } else {
        return redirect('category')->with('error', 'Failed to update category');
    }
}

    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = category::find($id);
        $product->delete();
        return redirect('category')->with('msg','Deleted Successfully');
    }
}
