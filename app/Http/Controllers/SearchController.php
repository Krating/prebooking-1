<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Booking;
use App\Payment;
use Auth;

class SearchController extends Controller
{

	public function search(Request $request)
    {
        $search = $request->search_code;
        $status = "open";
        $products = Product::where('product_name', 'like', '%'.$search.'%')->where('status' , $status)->get();
        return view('customer.index', ['products' => $products]);
    }

    public function searchProduct(Request $request)
    {
        $search = $request->search_code;
        $products = Product::where('product_name', 'like', '%'.$search.'%')->get();
        return view('admin.product.index', ['products' => $products]);
    }

    public function searchBooking(Request $request)
    {
        $search = $request->search_code;
        $bookings = Booking::where('booking_code', 'like', '%'.$search.'%')->get();
        return view('admin.booking.index', ['bookings' => $bookings]);
    }

    public function searchMyorder(Request $request)
    {
        $search = $request->search_code;
        $user = Auth::user()->id;
        $bookings = Booking::where('booking_code', 'like', '%'.$search.'%')->where('user_id', $user)->get();
        return view('customer.myorder', ['bookings' => $bookings]);
    }

    public function searchPayment(Request $request)
    {
        $search = $request->search_code;
        $payments = Payment::where('booking_code', 'like', '%'.$search.'%')->get();
        return view('admin.payment.index', ['payments' => $payments]);
    }
}
