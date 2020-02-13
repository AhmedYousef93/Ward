<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Shopcomment extends Model
{
    use Notifiable;
    public function shop()
    {
        return $this->belongsTo('App\Shop');
    }
    public function user()
    {
        return $this->belongsTo('App\User' );
    }
    public function rate()
    {
        return $this->belongsTo('willvincent\Rateable\Rating' );
    }
}
