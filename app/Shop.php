<?php

namespace App;

use willvincent\Rateable\Rateable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use DB;

class Shop extends Model
{
    use Rateable , Notifiable;
    public function flowers()
    {
        return $this->hasMany('App\Flower');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
  
}
