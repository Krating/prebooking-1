<?php

namespace App;

class Cart
{
    public $items = null;
    public $itemOnCart = null;
    public $totalQty = 0;
    public $totalPrice = 0;

    public function __construct($oldCart)
    {
    	if($oldCart){
            $this->items = $oldCart->items;
    		$this->itemOnCart = $oldCart->itemOnCart;
    		$this->totalQty = $oldCart->totalQty;
    		$this->totalPrice = $oldCart->totalPrice;
    	}
    }

    public function add($item, $id, $qty)
    {
    	$storedItem = ['qty' => 0, 'price' => $item->product_price, 'item' => $item];
    	if($this->items){
    		if(array_key_exists($id, $this->items)){
    			$storedItem = $this->items[$id];
    		}
    	}
    	$storedItem['qty'] += $qty;
    	$storedItem['price'] = $item->product_price*$storedItem['qty'];
    	$this->items[$id] = $storedItem;
    	$this->totalQty++;
        $new_total = $qty*$item->product_price;
    	$this->totalPrice += $new_total;
    }

    public function removeItem($id)
    {
        $this->totalPrice -= $this->items[$id]['price'];
        unset($this->items[$id]);
    }
}
