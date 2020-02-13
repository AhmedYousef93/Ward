<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdditionCategory extends Model
{
     public function additions()
    {
        return $this->hasMany('App\Addition', 'additioncategory_id');
    }
     public function flowers()
    {
        return $this->hasMany('App\Flower');
    }
}
