<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Flowercomment extends Model
{
    use Notifiable;
    public function flower()
    {
        return $this->belongsTo('App\Flower');
    }
    public function user()
    {
        return $this->belongsTo('App\User' );
    }
}
