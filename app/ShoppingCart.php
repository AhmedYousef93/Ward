<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    public function flower()
    {
        return $this->belongsTo('App\Flower');
    }
}
