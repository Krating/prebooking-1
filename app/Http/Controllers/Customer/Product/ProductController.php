<?php

namespace App\Http\Controllers\Customer\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Category;

class ProductController extends Controller
{

    public function index()
    {
        $status = "open";
        $products = Product::where('status', $status)->get();
        return view('customer.product.index', ['products' => $products]);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        $product = Product::find($id);
        return view('customer.product.show', ['product' => $product]);
    }

 
    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
