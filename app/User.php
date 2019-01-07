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
      return $this->belongsToMany(Location::class);
    }


    protected $appends = ['city'];

  	public function getCityAttribute()
  	{

        foreach ($this->locations as $loca) {

          $cities[] = $loca->city;
        }

        $city = implode(',', $cities);

        return $city;


  	}

    // Route Model Binding Customizing The Key Name
    public function getRouteKeyname()
    {
      return 'email';
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
