<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Additionpay extends Model
{
    public function addition()
    {
        return $this->belongsTo('App\Addition');
    }
}
