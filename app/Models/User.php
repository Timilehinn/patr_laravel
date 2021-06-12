<?php

namespace App\Models;

use Tymon\JWTAuth\Contracts\JWTSubject;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory;
      /**
     * @return mixed
     */
    // identifier stored in jwt
    public function getJWTIdentifier() {
        return $this->getKey();
    }

    /**
     * @return array
     */
    // return key value array, containing custom claims to be added to the JWT.
    public function getJWTCustomClaims() {
        return [];
    }    
}
