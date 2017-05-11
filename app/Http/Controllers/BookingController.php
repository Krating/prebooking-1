<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Product;
use App\Booking;

class BookingController extends Controller
{

    public function index()
    {
        //
    }


    public function create($id)
    {
        $product = Product::find($id);
        return view('booking.create', ['product' => $product]);
    }


    public function store(Request $request)
    {
        $this->validate($request,[
            'product_id' => 'required',
            'number' => 'required|numeric',
            'payment_date' => 'required',
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

        $booking['debt'] = $total_price;

        Auth::user()->bookings()->save($booking);
        // $this->bookingDetail($productbooked);
        return redirect()->route('products.index');
    }


    public function show($id)
    {
        $booking = Booking::find($id);
        return view('booking.show', ['booking' => $booking]);
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
