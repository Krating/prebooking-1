<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Booking;
use App\Payment;
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

    public function approve($id, $idx){

        $order = Booking::find($idx);      
        $amount = Payment::where('id', $id)->value('amount');
        $deposit = Booking::where('id', $idx)->value('deposit');
        $deposit_new = $deposit+$amount;
        $order->deposit = $deposit_new;

        $debt = Booking::where('id', $idx)->value('debt');
        $total_price = Booking::where('id', $idx)->value('total_price');
        $debt_new = $total_price-$deposit_new;
        $order->debt = $debt_new;
        $order->save();

        $debt = Booking::where('id', $idx)->value('debt');
        if($debt <= "0"){
	        $status_old = Booking::where('id', $idx)->value('status');
	        $status_new = "Fully Paid";
	        $order->status = $status_new;
        } else {
        	$status_old = Booking::where('id', $idx)->value('status');
        	$status_new = "Deposit";
        	$order->status = $status_new;
		}
        $order->save();

        $payment = Payment::find($id);
        $status_old = Payment::where('id', $id)->value('status');
        $status_new = "Approved";
        $payment->status = $status_new;
        $payment->save();
        
        $booking = Booking::find($idx);
        $user = Booking::where('id', $idx)->value('user_id');
        $this->bookingDetail($booking, $user);

        return redirect()->route('payment.index');  
    }

    public function bookingDetail($booking, $user){
        $mail = User::find($user)->email;
        Mail::to($mail)->send(new BookingDetail($booking));
    }
}
