<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    public $fillable = [
    	'user_id', 'booking_code', 'product_id', 'coupon_id', 'number', 'total_price', 'deposit', 'debt', 'payment_date', 'transmission_date', 'status', 
    	];

    public function product()
    {
    	return $this->belongsTo('App\Product');
    }

    public function user()
    {
		return $this->belongsTo('App\User');
	}

    public function payments()
    {
        return $this->hasMany('App\Payment');
    }
}
