<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vouncheritem extends Model
{
    public $items=null;
    public $total=0;
    public $buyTotal=0;
    public $quantity=0;

    public function __construct($oldCart)
    {
        if($oldCart)
        {
            $this->items=$oldCart->items;
            $this->total=$oldCart->total;
            $this->quantity=$oldCart->quantity;
            $this->buyTotal=$oldCart->buyTotal;
        }
    }

    public function addItem($id,$post,$qty)
    {
        $storeItem = ['item' => null, 'qty' => 0, 'category' => null,'amount'=>0, 'buy_amount'=>0];
        if ($this->items) {
            if (array_key_exists($id, $this->items)) {
                $storeItem = $this->items[$id];
            }
        }
        $storeItem['item'] = $post;
        $storeItem['qty'] = $storeItem['qty'] + $qty;
        $storeItem['amount']=$storeItem['qty']*$post->sale_price;
        $storeItem['buy_amount']=$storeItem['qty']*$post->buy_price;
        $storeItem['category'] = $post->category->name;
        $this->items[$id] = $storeItem;
        $this->quantity+=$qty;
        $this->total+=$qty*$post->sale_price;
        $this->buyTotal+=$qty*$post->buy_price;
    }
}
