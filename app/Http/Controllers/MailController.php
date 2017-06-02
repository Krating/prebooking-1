<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MailController extends Controller
{
    public function bookingDetail($booking, $user){
        $mail = User::find($user)->email;
        Mail::to($mail)->send(new BookingDetail($booking));
    }
}
