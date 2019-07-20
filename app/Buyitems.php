<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buyitems extends Model
{
    public $items=null;

    public function __construct($oldCart)
    {
        if($oldCart)
        {
            $this->items=$oldCart->items;
        }
    }

    public function addItem($id,$post,$qty)
    {
        $storeItem=['item'=>null,'qty'=>0,'category'=>null];
        if($this->items)
        {
            if(array_key_exists($id,$this->items))
            {
                $storeItem=$this->items[$id];
            }
        }
        $storeItem['item']=$post;
        $storeItem['qty']=$storeItem['qty']+$qty;
        $storeItem['category']=$post->category->name;
        $this->items[$id]=$storeItem;
    }
}
