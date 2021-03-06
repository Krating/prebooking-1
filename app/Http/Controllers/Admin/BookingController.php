<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Product;
use App\Booking;
use App\Promotion;
use App\User;
use App\Coupon;
use Mail;
use App\Mail\BookingDetail;

class BookingController extends Controller
{

    public function index()
    {
        $bookings = Booking::get();
        return view('admin.booking.index', ['bookings' => $bookings]);
    }


    public function create($id)
    {
    	//
    }


    public function store(Request $request)
    {
    	//
    }

    public function show($id)
    {
        $booking = Booking::find($id);
        return view('admin.booking.show', ['booking' => $booking]);
    }


    public function edit($id)
    {
        $booking = Booking::find($id);
        return view('admin.booking.edit', ['booking' => $booking]);
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
        	'payment_date' => 'required',
        ]);

        $booking = Booking::find($id);
        $booking->update($request->all());

        $status_new = "Waiting for deposit";
        $booking->status = $status_new;
        $booking->save();

        $number = Booking::where('id', $id)->value('number');
        $product_id = Booking::where('id', $id)->value('product_id');
        $promotion = Product::find($product_id)->promotion_id;
        $promotion_number = Promotion::where('id', $promotion)->value('number');
        $promotion_name = Promotion::where('id', $promotion)->value('promotion_name');
        $coupon_id = Booking::where('id', $id)->value('coupon_id');
        $discount = Promotion::where('id', $promotion)->value('discount');

        $user = Booking::where('id', $id)->value('user_id');

        if($coupon_id === NULL){
            if($promotion_number <= $number){
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

        $this->bookingDetail($booking, $user);

        return redirect()->route('booking.index')->with('status', 'The booking has been approved');
    }

   public function bookingDetail($booking, $user){
        $mail = User::find($user)->email;
        Mail::to($mail)->send(new BookingDetail($booking));
    }

    public function destroy($id)
    {
        //
    }

}

