<?php

namespace App\Http\Controllers\Admin\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Category;
use App\Promotion;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Input as input;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
    
    public function index()
    {
        $products = Product::get();
        return view('admin.product.index', ['products' => $products]);
    }

    
    public function create()
    {
        $category = Category::pluck('category_name','id');
        $promotion = Promotion::pluck('promotion_name','id');
        return view('admin.product.create', ['category' => $category, 'promotion' => $promotion]);
    }

    
    public function store(Request $request, ImageManager $photo)
    {
        $this->validate($request,[
            'category_id' => 'required',
            'product_name' => 'required|unique:products',
            'product_price' => 'required|numeric',
            'product_number' => 'required|numeric',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);

        $input = $request->all();
        $img = $request->file('photo');
        $photoname = time().'-'.$img->getClientOriginalName();
        $path = public_path('photos');
        $photo->make($img)->resize(170, 170)->save($path.'/'.$photoname);
        $input['photo'] = $photoname;
        $product = new Product($input);
        $status = "close";
        $product['status'] = $status;
        $product->save();

        return redirect()->route('product.index')->with('status', 'Create Product is Successful!');
    }

    
    public function show($id)
    {
        $product = Product::find($id);
        return view('admin.product.show', ['product' => $product]);
    }

    
    public function edit($id)
    {
        $product = Product::find($id);
        $category = Category::pluck('category_name','id');
        $promotion = Promotion::pluck('promotion_name','id');
        return view('admin.product.edit', ['product' => $product, 'category' => $category, 'promotion' => $promotion]);
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

    public function openbooking($id)
    {
        $product = Product::find($id);
        $status_new = "open";
        $product['status'] = $status_new;
        $product->save();
        return redirect()->route('product.index')->with('status', $product->product_name.' has been opened');
    }

    public function closebooking($id)
    {
        $product = Product::find($id);
        $status_new = "close";
        $product['status'] = $status_new;
        $product->save();
        return redirect()->route('product.index')->with('status', $product->product_name.' has been closed');
    }
}
