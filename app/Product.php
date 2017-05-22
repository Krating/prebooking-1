<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $fillable = [
    	'category_id', 'product_name', 'product_price', 'product_number', 'description', 'promotion_id'
    	];

    public function category()
    {
		return $this->belongsTo('App\Category');
	}

	public function promotion()
    {
		return $this->belongsTo('App\Promotion');
	}

	public function bookings(){

		return $this->hasMany('App\Booking');
	}
}
