<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    public $fillable = [
    	'user_id', 'promotion_id', 'coupon_name'
    	];

    public function promotion(){
		return $this->belongsTo('App\Promotion');
	}

	public function user()
    {
		return $this->belongsTo('App\User');
	}
}
