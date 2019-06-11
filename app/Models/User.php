<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject as AuthenticatableUserContract;

class User extends Authenticatable implements AuthenticatableUserContract
{
    protected $table = 'users';
    protected $guarded = ['id'];
    protected $hidden = ['password', 'remember_token'];

    /**
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey(); // Eloquent model method
    }

    /**
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

/*    public function weixin()
    {
        return $this->hasOne('App\Models\UserWeixin','user_id');
    }

    public function web()
    {
        return $this->hasOne('App\Models\UserWeb','user_id');
    }*/

}
