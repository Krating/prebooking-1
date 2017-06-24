<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Booking;
use App\Product;
use App\Coupon;

class CustomerController extends Controller
{

    public function profile()
    {
        $user = Auth::user();
        return view('customer.profile', ['user' => $user]);
    }

    public function coupon()
    {
        $user = Auth::user()->id;
        $coupons = Coupon::where('user_id', $user)->get();
        return view('customer.coupon', ['coupons' => $coupons]);
    }

    public function index()
    {
        $status = "open";
        $products = Product::where('status', $status)->Paginate(8);
        return view('customer.index', ['products' => $products]);
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
        $customer = Auth::user();
        return view('customer.edit', ['customer' => $customer]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'password' => 'required|min:6|confirmed',
        ]);

        $customer = Auth::user();
        $customer->password = bcrypt($request->password);
        $customer->save();
        return redirect()->route('user-management.customer');
    }


    public function destroy($id)
    {
        //
    }
}
