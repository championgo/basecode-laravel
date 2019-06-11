<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
//use Spatie\Permission\Traits\HasRoles;
use Tymon\JWTAuth\Contracts\JWTSubject as AuthenticatableUserContract;

class Admin extends Authenticatable implements AuthenticatableUserContract
{
    use Notifiable;
//    use HasRoles;
    protected $table = 'admin';
    protected $guarded = ['id'];
    protected $hidden = ['password'];
    protected $guard_name = 'admin';
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

}
