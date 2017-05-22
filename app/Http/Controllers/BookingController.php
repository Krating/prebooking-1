<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        $bookings = Booking::get();
        return view('booking.index', ['bookings' => $bookings]);
    }


    public function create($id)
    {
        $product = Product::find($id);
        $user = Auth::user()->id;
        $coupons = Coupon::where('user_id', $user)->pluck('coupon_name','id');
        return view('booking.create', ['product' => $product, 'coupons' => $coupons]);
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

        $discount = 0;
        $booking['discount'] = $discount;

        $booking['debt'] = $total_price;

        Auth::user()->bookings()->save($booking);

        $number = $request->number;
        $promotion = Product::find($request->product_id)->promotion_id;
        $pro_num = Promotion::where('id', $promotion)->value('number');
        $promotion_number = strval($pro_num);
        $promotion_name = Promotion::where('id', $promotion)->value('promotion_name');
        $coupon_id = $request->coupon_id;
        $discount = Promotion::where('id', $promotion)->value('discount');

        if($coupon_id === NULL){
            if($promotion_number <= $number){
                $user = Auth::user()->id;
                $coupon = new Coupon;
                $coupon->user_id = $user;
                $coupon->promotion_id = $promotion;
                $coupon->coupon_name = $promotion_name;
                $coupon->save();
            }
        }else{
            $total_discount = ($total_price*$discount)/100;
            $total_net = $total_price-$total_discount;
            $booking['total_price'] = $total_net;
            $booking['debt'] = $total_net;
            $booking['discount'] = $total_discount;
            $booking->save();

            $coupon = Coupon::find($coupon_id);
            $coupon->delete();
        }

        $this->bookingDetail($booking);
        return redirect()->route('products.index');
    }


    public function bookingDetail($booking){
        
        $mail = Auth::user()->email;
        Mail::to($mail)->send(new BookingDetail($booking));
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
