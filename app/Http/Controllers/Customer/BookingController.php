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
use App\Payment;
use Mail;
use App\Mail\BookingDetail;
use Carbon\Carbon;
use Illuminate\Support\Str;

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
        ]);

        $num = Product::find($request->product_id);
        $product_number = Product::where('id', $request->product_id)->value('product_number');
        $number = intval($request->number);
        $result = $product_number-$number;
        $num->product_number = $result;
        $num->save();

        $booking = new Booking($request->all());

        $today = Carbon::today()->toDateTimeString();
        $dt = explode(' ' ,$today);
        $dt0 = $dt[0];
        $datetime = explode('-' ,$dt0);
        $year = $datetime[0];
        $month = $datetime[1];
        $day = $datetime[2];
        $charset = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $random = Str::random(4);
        $code = "PB";
        $booking['booking_code'] = $code.$year.$month.$day.$random;
        
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
        $payments = Payment::where('booking_id', $id)->get();
        return view('customer.booking.show', ['booking' => $booking, 'payments' => $payments]);
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
