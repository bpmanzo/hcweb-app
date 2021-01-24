<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
   
    public $items; // ['id' => ['quantity' =>, 'price'=>, 'data'=>],....]
    public $totalQuantity;
    public $totalPrice;

    public function __construct($prevCart)
    {
        if($prevCart != null){
            $this->items = $prevCart->items;
            $this->totalQuantity = $prevCart->totalQuantity;
            $this->totalPrice = $prevCart->totalPrice;

        }else{
            $this->items = [];
            $this->totalQuantity = 0;
            $this->totalPrice = 0;
        }
    }

    public function addItem($id, $product){
        
        $price = (int) str_replace("₱","",$product->price);

        //this item already exists
        if(array_key_exists($id, $this->items)){
            
            $productToAdd = $this->items($id);
            $productToAdd['quantity']++;
       
        //first time to add item to cart
        }else{

            $productToAdd = ['quantity'=>1, 'price'=>$price, 'data'=>$product];


        }

        $this->items[$id] = $productToAdd;
        $this->totalQuantity++;
        $this->totalPrice = $this->totalPrice + $price;

    }

    use HasFactory;

}
