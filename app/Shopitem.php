<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shopitem extends Model
{
    public function item()
    {
        return $this->belongsTo("App\Item");
    }
    public function shop()
    {
        return $this->belongsTo("App\Shop");
    }
}
