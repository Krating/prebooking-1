<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    public $fillable = [
    	'promotion_name', 'number', 'discount', 'description'
    	];

    public function products(){
		return $this->hasMany('App\Product');
	}

	public function coupons(){
		return $this->hasMany('App\Coupon');
	}
}
