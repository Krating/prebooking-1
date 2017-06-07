<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Booking;
use App\Promotion;
use App\Payment;
use App\Coupon;
use App\User;
use Auth;
use Mail;
use App\Mail\BookingDetail;

class PaymentController extends Controller
{
	
	public function index()
    {
        $payments = Payment::all();
        return view('payment.index', compact('payments'));
    }

	public function show($id)
    {
        $payment = Payment::find($id);
        return view('payment.show', compact('payment'));
    }

    public function approve($id, $booking){

        $order = Booking::find($booking);      
        $amount = Payment::where('id', $id)->value('amount');
        $deposit = Booking::where('id', $booking)->value('deposit');
        $deposit_new = $deposit+$amount;
        $order->deposit = $deposit_new;

        $debt = Booking::where('id', $booking)->value('debt');
        $total_price = Booking::where('id', $booking)->value('total_price');
        $debt_new = $total_price-$deposit_new;
        $order->debt = $debt_new;
        $order->save();

        $debt = Booking::where('id', $booking)->value('debt');
        if($debt <= "0"){
	        $status_old = Booking::where('id', $booking)->value('status');
	        $status_new = "Fully Paid";
	        $order->status = $status_new;
        } else {
        	$status_old = Booking::where('id', $booking)->value('status');
        	$status_new = "Deposit";
        	$order->status = $status_new;
		}
        $order->save();

        $payment = Payment::find($id);
        $status_old = Payment::where('id', $id)->value('status');
        $status_new = "Approved";
        $payment->status = $status_new;
        $payment->save();

        $user = Booking::where('id', $booking)->value('user_id');
        $coupon_id = Booking::where('id', $booking)->value('coupon_id');
        $number = Booking::where('id', $booking)->value('number');
        $product_id = Booking::where('id', $booking)->value('product_id');
        $promotion = Product::find($product_id)->promotion_id;
        $promotion_number = Promotion::where('id', $promotion)->value('number');
        $promotion_name = Promotion::where('id', $promotion)->value('promotion_name');
        $status = Booking::where('id', $booking)->value('status');
        if($coupon_id === NULL){
            if($promotion_number <= $number){
                if($status === "Fully Paid"){
                    $coupon = new Coupon;
                    $coupon->user_id = $user;
                    $coupon->promotion_id = $promotion;
                    $coupon->coupon_name = $promotion_name;
                    $coupon->save();
                }
            }
        }
        
        $booking = Booking::find($booking);
        $this->bookingDetail($booking, $user);

        return redirect()->route('payment.index');  
    }

    public function bookingDetail($booking, $user){
        $mail = User::find($user)->email;
        Mail::to($mail)->send(new BookingDetail($booking));
    }
}
