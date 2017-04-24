<?php

namespace App\Http\Controllers\Admin\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Category;

class CategoryController extends Controller
{
    
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index', ['categories' => $categories]);
    }

    
    public function create()
    {
        return view('admin.category.create');
    }

    
    public function store(Request $request)
    {
        $this->validate($request,[
            'category_name' => 'required|unique:categories',
            ]);
        Category::create($request->all());
        return redirect()->route('category.index')->with('status', 'Create Category is Successful!');
    }

    
    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit', ['category' => $category]);
    }

    
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'category_name' => 'required',
            ]);

        $category = Category::find($id);
        $category->update($request->all());
        return redirect()->route('category.index')->with('status', $category->category_name.' has been edited');
    }

    
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('category.index')->with('status', $category->category_name.' has been deleted');
    }
}
