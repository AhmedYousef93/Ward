<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class designer extends Model
{

	 protected $table = 'designers';
    protected $fillable = [
      'name'
    ];
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
    public function flowers()
    {
        return $this->hasMany('App\Flower');
    }
}
