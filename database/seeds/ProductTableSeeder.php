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
    		'promotion_id' => 1,
    		'product_name' => 'Steel Rod',
    		'product_price' => '40',
            'product_number' => '10000',
    		'photo' => '1496919329-tmn.jpg',
            'description' => 'length 6 meters',
    		'status' => 'close'
            ],
    		[
    		'id' => 2,
            'category_id' => 1,
    		'promotion_id' => null,
    		'product_name' => 'Steel Plate',
    		'product_price' => '100',
    		'product_number' => '20000',
            'photo' => '1496919329-tmn.jpg',
            'description' => '',
    		'status' => 'close'
            ],
    		[
    		'id' => 3,
            'category_id' => 2,
    		'promotion_id' => 1,
    		'product_name' => 'Cement Pole',
    		'product_price' => '100',
    		'product_number' => '5000',
            'photo' => '1496919329-tmn.jpg',
    		'description' => '5 inchs',
            'status' => 'close'
            ],
            [
            'id' => 4,
            'category_id' => 2,
            'promotion_id' => null,
            'product_name' => 'Test',
            'product_price' => '100',
            'product_number' => '20000',
            'photo' => '1496919329-tmn.jpg',
            'description' => '',
            'status' => 'open'
            ],
            [
            'id' => 5,
            'category_id' => 2,
            'promotion_id' => null,
            'product_name' => 'Test01',
            'product_price' => '100',
            'product_number' => '20000',
            'photo' => '1496919329-tmn.jpg',
            'description' => '',
            'status' => 'open'
            ],
            [
            'id' => 6,
            'category_id' => 2,
            'promotion_id' => null,
            'product_name' => 'Test02',
            'product_price' => '100',
            'product_number' => '20000',
            'photo' => '1496919329-tmn.jpg',
            'description' => '',
            'status' => 'open'
            ],
            [
            'id' => 7,
            'category_id' => 2,
            'promotion_id' => null,
            'product_name' => 'Test03',
            'product_price' => '100',
            'product_number' => '20000',
            'photo' => '1496919329-tmn.jpg',
            'description' => '',
            'status' => 'open'
            ],
            [
            'id' => 8,
            'category_id' => 2,
            'promotion_id' => null,
            'product_name' => 'Test04',
            'product_price' => '100',
            'product_number' => '20000',
            'photo' => '1496919329-tmn.jpg',
            'description' => '',
            'status' => 'open'
            ],
            [
            'id' => 9,
            'category_id' => 2,
            'promotion_id' => null,
            'product_name' => 'Test05',
            'product_price' => '100',
            'product_number' => '20000',
            'photo' => '1496919329-tmn.jpg',
            'description' => '',
            'status' => 'open'
            ],
            [
            'id' => 10,
            'category_id' => 2,
            'promotion_id' => null,
            'product_name' => 'Test06',
            'product_price' => '100',
            'product_number' => '20000',
            'photo' => '1496919329-tmn.jpg',
            'description' => '',
            'status' => 'open'
            ],
            [
            'id' => 11,
            'category_id' => 3,
            'promotion_id' => null,
            'product_name' => 'Test07',
            'product_price' => '100',
            'product_number' => '20000',
            'photo' => '1496919329-tmn.jpg',
            'description' => '',
            'status' => 'open'
            ],
            [
            'id' => 12,
            'category_id' => 3,
            'promotion_id' => null,
            'product_name' => 'Test08',
            'product_price' => '100',
            'product_number' => '20000',
            'photo' => '1496919329-tmn.jpg',
            'description' => '',
            'status' => 'open'
            ],
            [
            'id' => 14,
            'category_id' => 3,
            'promotion_id' => null,
            'product_name' => 'Test09',
            'product_price' => '100',
            'product_number' => '20000',
            'photo' => '1496919329-tmn.jpg',
            'description' => '',
            'status' => 'open'
            ],
            [
            'id' => 15,
            'category_id' => 3,
            'promotion_id' => null,
            'product_name' => 'Test10',
            'product_price' => '100',
            'product_number' => '20000',
            'photo' => '1496919329-tmn.jpg',
            'description' => '',
            'status' => 'open'
            ],
    	];
    }
}
