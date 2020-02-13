<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flowersize extends Model
{
    public function flower()
    {
        return $this->belongsTo('App\Flower' );
    }
}
