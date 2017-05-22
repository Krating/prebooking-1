<?php

namespace App\Http\Controllers\Admin\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Category;
use App\Promotion;

class PromotionController extends Controller
{
    public function index()
    {
        $promotions = Promotion::all();
        return view('admin.promotion.index', ['promotions' => $promotions]);
    }

    
    public function create()
    {
        return view('admin.promotion.create');
    }

    
    public function store(Request $request)
    {
        $this->validate($request,[
        	'promotion_name' => 'required',
            'number' => 'required|numeric',
            'discount' => 'required|numeric',
            ]);
        Promotion::create($request->all());
        return redirect()->route('promotion.index')->with('status', 'Create Promotion is Successful!');
    }

    public function destroy($id)
    {
        $promotion = Promotion::find($id);
        $promotion->delete();
        return redirect()->route('promotion.index')->with('status', $promotion->promotion_name.' has been deleted');
    }
}
