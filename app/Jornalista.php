<?php

namespace App;



use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class Jornalista extends Model implements AuthenticatableContract, AuthorizableContract
{

    use Authenticatable, Authorizable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'nome', 'sobrenome', 'password', 
    ];    

}
