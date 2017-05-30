<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use App\Product;
use App\Booking;
use App\Promotion;
use App\Coupon;
use Mail;
use App\Mail\BookingDetail;

class BookingController extends Controller
{
    public function index()
    {
        $user = Auth::user()->id;
        $bookings = Booking::where('user_id', $user)->get();
        return view('customer.myorder', ['bookings' => $bookings]);
    }


    public function create($id)
    {
        $product = Product::find($id);
        $user = Auth::user()->id;
        $coupons = Coupon::where('user_id', $user)->pluck('coupon_name','id');
        return view('customer.booking.create', ['product' => $product, 'coupons' => $coupons]);
    }


    public function store(Request $request)
    {
        $this->validate($request,[
            'product_id' => 'required',
            'number' => 'required|numeric',
            'transmission_date' => 'required',
        ]);

        $num = Product::find($request->product_id);
        $product_number = Product::where('id', $request->product_id)->value('product_number');
        $number = intval($request->number);
        $result = $product_number-$number;
        $num->product_number = $result;
        $num->save();
        $booking = new Booking($request->all());
        
        $status = "Processing";
        $booking['status'] = $status;

        $product_price = Product::where('id', $request->product_id)->value('product_price');
        $total_price = $product_price*$number;
        $booking['total_price'] = $total_price;

        $deposit = 0;
        $booking['deposit'] = $deposit;

        $discount = 0;
        $booking['discount'] = $discount;

        $booking['debt'] = $total_price;

        Auth::user()->bookings()->save($booking);

        return redirect()->route('products.index');
    }

    public function show($id)
    {
        $booking = Booking::find($id);
        return view('customer.booking.show', ['booking' => $booking]);
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
