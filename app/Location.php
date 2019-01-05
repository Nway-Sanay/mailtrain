<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    //
    protected $fillable = [
        'city'
    ];

    public function Users()
    {
      // code...
      return $this->belongsToMany('App\User');
    }
}
