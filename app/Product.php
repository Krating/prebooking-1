<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $fillable = [
    	'category_id', 'product_name', 'product_price', 'product_number', 'description'
    	];
    public function category(){
		return $this->belongsTo('App\Category');
	}
}
