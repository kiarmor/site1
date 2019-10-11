<?php

namespace App\Models;

class Cart
{
   public $items = null;
   public $totalQty = 0;
   public $totalPrice = 0;

    public function __construct($oldCart)
    {
         if ($oldCart){
             $this->items = $oldCart->items;
             $this->totalQty = $oldCart->totalQty;
             $this->totalPrice = $oldCart->totalPrice;
         }
    }

    public function add($item, $productId)
    {
        $storedItem = ['qty' => 0, 'price' => $item->price, 'item' => $item];
        if ($this->items){
            if (array_key_exists($productId, $this->items)){
                $storedItem = $this->items[$productId];
            }
        }
        $storedItem['qty']++;
        $storedItem['price'] = $item->price * $storedItem['qty'];
        $this->items[$productId] = $storedItem;
        $this->totalQty++;
        $this->totalPrice += $item->price;
    }
}
