<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','is_activate'
    ];

    public function mail_list()
    {
      return $this->hasMany(MailList::class);
    }

    public function locations()
    {
      // code...
      return $this->belongsToMany(Location::class)->withPivot('cities');
    }


    protected $appends = ['cities'];
    //
  	public function getCitiesAttribute()
  	{

    // $user = User::find(1)->locations()->orderBy('city')->get();
    // $user = User::find(1);
    //
    foreach ($this->locations as $loca) {
      // code...
      $cities[] = $loca->pivot->cities;
    }

    return $cities;

      // return $location;

  	}

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        // 'password',
         // 'remember_token',
    ];

    public $timestamps=false;

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

     public function getJWTCustomClaims()
    {
        return [];
    }


}
