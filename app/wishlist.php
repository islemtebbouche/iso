<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class wishlist 
{
    public $items = [];
    public $totalQty ;
    public $totalPrice;

    public function __Construct($wishlist = null) {
        if($wishlist) {
            $this->items = $wishlist->items;
            $this->totalQty = $wishlist->totalQty;
            $this->totalPrice = $wishlist->totalPrice;
        } else {
            $this->items = [];
            $this->totalQty = 0;
            $this->totalPrice = 0;
        }
    }

    public function add($product) {
        
        $item = [
            'id' => $product->id,
            'title' => $product->title,
            'price' => $product->price,
            'qty' => 0,
            'image' => $product->image,
        ];

        if( !array_key_exists($product->id, $this->items)) {
            $this->items[$product->id] = $item ;
            $this->totalQty +=1;
            $this->totalPrice += $product->price; 
        } else {
            $this->totalQty +=1 ;
            $this->totalPrice += $product->price; 
        }

        $this->items[$product->id]['qty']  += 1 ;
    }
    public function remove($id) {

        if( array_key_exists($id, $this->items)) {
            $this->totalQty -= $this->items[$id]['qty'];
            $this->totalPrice -= $this->items[$id]['qty'] * $this->items[$id]['price'];
            unset($this->items[$id]);

        }
}
}
