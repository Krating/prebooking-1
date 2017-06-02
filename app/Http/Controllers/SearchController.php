<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Booking;

class SearchController extends Controller
{

	public function search(Request $request)
    {
        $search = $request->search_code;
        $status = "open";
        $products = Product::where('product_name', 'like', '%'.$search.'%')->where('status' , $status)->get();
        dd($products);
        return view('customer.index', ['products' => $products]);
    }

    public function searchBooking(Request $request)
    {
        // $search = $request->search_code;
        // $bookings = Product::where('product_name', 'like', '%'.$search.'%')->where('status' , $status)->get();
        // dd($bookings);
        // return view('admin.booking.index', ['bookings' => $bookings]);
    }
}
