<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert($this->getProduct());
    }
    private function getProduct(){
    	return
    	[
    		[
    		'id' => 1,
    		'category_id' => 1,
    		'product_name' => 'Steel Rod',
    		'product_price' => '40',
    		'product_number' => '10000',
            'description' => 'length 6 meters',
    		'status' => 'close'
            ],
    		[
    		'id' => 21,
    		'category_id' => 1,
    		'product_name' => 'Steel Plate',
    		'product_price' => '100',
    		'product_number' => '20000',
            'description' => '',
    		'status' => 'close'
            ],
    		[
    		'id' => 31,
    		'category_id' => 21,
    		'product_name' => 'Cememt Pole',
    		'product_price' => '100',
    		'product_number' => '5000',
    		'description' => '5 inchs',
            'status' => 'close'
            ]
    	];
    }
}
