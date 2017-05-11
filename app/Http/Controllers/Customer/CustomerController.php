<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Booking;
use App\Product;

class CustomerController extends Controller
{

    public function profile()
    {
        $user = Auth::user();
        return view('customer.profile', ['user' => $user]);
    }

    public function myorders()
    {
        $user = Auth::user()->id;
        $bookings = Booking::where('user_id', $user)->get();
        return view('customer.myorder', ['bookings' => $bookings]);
    }

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
