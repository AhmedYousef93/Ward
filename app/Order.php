<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User' );
    }
    public function pay()
    {
        return $this->belongsTo('App\Pay');
    }
    public function flower()
    {
        return $this->belongsTo('App\Flower');
    }
    public function addition()
    {
        return $this->belongsTo('App\Addition');
    }
    public function flowersize()
    {
        return $this->belongsTo('App\Flowersize');
    }
      public function card()
    {
        return $this->belongsTo('App\Card' );
    }
}
