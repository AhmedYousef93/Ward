<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flower extends Model
{
    public function flowerimage()
    {
        return $this->hasMany('App\Flowerimage' );
    }
    public function flowersize()
    {
        return $this->hasMany('App\Flowersize' );
    }
    public function subcategory()
    {
        return $this->belongsTo('App\Subcategory');
    }
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
    public function additioncategory()
    {
        return $this->belongsTo('App\AdditionCategory');
    }
    public function designer()
    {
        return $this->belongsTo('App\designer');
    }
    public function pays()
    {
        return $this->belongsToMany('App\Pay' );
    }
    public function orders()
    {
        return $this->belongsToMany('App\Order' );
    }

}
