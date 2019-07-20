<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vouncher extends Model
{
    public function saleItem()
    {
        return $this->hasMany('App\Saleitem');
    }
    public function shop()
    {
        return $this->belongsTo("App\Shop");
    }
}
