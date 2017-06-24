<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Image;
use App\User;
use App\Product;
use App\Category;
use App\Booking;
use App\Payment;
use Intervention\Image\ImageManager;

class PaymentController extends Controller
{
    public function create($id)
    {
        $booking = Booking::find($id);
        return view('payment.create', ['booking' => $booking]);
    }
    public function store(Request $request, ImageManager $slip)
    {
        $this->validate($request,[
            'booking_id' => 'required',
            'amount' => 'required|numeric',
            'date' => 'required',
            'time' => 'required',
            'slip' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);
        $input = $request->all();
        $img = $request->file('slip');
        $slipname = time().'_'.$img->getClientOriginalName();
        $path = public_path('slips');
        $slip->make($img)->resize(370, 370)->save($path.'/'.$slipname);
        $input['slip'] = $slipname;
        $status = "Processing";
        $input['status'] = $status;
        $booking_code = Booking::where('id', $request->booking_id)->value('booking_code');
        $input['booking_code'] = $booking_code;
        Payment::create($input);
        return redirect()->route('myorder.index');
    }
}
