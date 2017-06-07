<?php

use Illuminate\Database\Seeder;
use App\Promotion;

class PromotionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('promotions')->insert($this->getPromotions());
    }

    private function getPromotions(){
    	return
    	[
    		[
    		'id' => 1,
    		'promotion_name' => '10% off',
    		'number' => '1000',
            'discount' => '10',
    		'description' => 'Booking 1000 ea, get 10% discount coupon for next booking']
    	];
    }
}
