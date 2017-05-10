<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    public $fillable = [
    	'user_id', 'product_id', 'number', 'address', 'status', 'total_price', 'deposit', 'debt'
    	];

    public function product(){
    	return $this->belongTo('App\Product');
    }
}
