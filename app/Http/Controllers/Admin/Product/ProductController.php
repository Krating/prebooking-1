<?php

namespace App\Http\Controllers\Admin\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Category;

class ProductController extends Controller
{
    
    public function index()
    {
        $products = Product::with('category')->get();
        return view('admin.product.index', ['products' => $products]);
    }

    
    public function create()
    {
        $category = Category::pluck('category_name','id');
        return view('admin.product.create', ['category' => $category]);
    }

    
    public function store(Request $request)
    {
        $this->validate($request,[
            'category_id' => 'required',
            'product_name' => 'required|unique:products',
            'product_price' => 'required|numeric',
            'product_number' => 'required|numeric',
        ]);
        Product::create($request->all());
        return redirect()->route('product.index')->with('status', 'Create Product is Successful!');
    }

    
    public function show($id)
    {
        $product = Product::find($id);
        return view('products.show', ['product' => $product]);
    }

    
    public function edit($id)
    {
        $product = Product::find($id);
        $category = Category::pluck('category_name','id');
        return view('admin.product.edit', ['product' => $product, 'category' => $category]);
    }

    
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'category_id' => 'required',
            'product_name' => 'required',
            'product_price' => 'required|numeric',
            'product_number' => 'required|numeric',
        ]);

        $product = Product::find($id);
        $product->update($request->all());
        return redirect()->route('product.index')->with('status', $product->product_name.' has been edited');
    }

    
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('product.index')->with('status', $product->product_name.' has been deleted');
    }
}
