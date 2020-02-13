<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Addition extends Model
{
    public function additioncategory()
    {
        return $this->belongsTo('App\AdditionCategory');
    }
}
