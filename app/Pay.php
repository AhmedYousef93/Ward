<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Pay extends Model
{
    use Notifiable;
   /* public function flowers()
    {
        return $this->belongsToMany('App\Flower' );
    }*/
    public function user()
    {
        return $this->belongsTo('App\User' );
    }

    public function bank()
    {
        return $this->belongsTo('App\Bank' );
    }
    public function addresss()
    {
        return $this->belongsTo('App\Address', 'address_id' );
    }
    public function carts()
    {
        return $this->hasMany('App\ShoppingCart' );
    }
     public function card()
    {
        return $this->belongsTo('App\Card' );
    }
    public function orders()
    {
        return $this->hasMany('App\Order');
    }

}
