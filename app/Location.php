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
      return $this->belongsToMany('App\User');
    }

    // Route Model Binding Customizing The Key Name
    public function getRouteKeyname()
    {
      return 'city';
    }
}
