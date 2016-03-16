<?php

 namespace Lembarek\Auth\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Lembarek\Role\Traits\Roleable;

class User extends Authenticatable
{
    use Roleable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password',
    ];

    /**
     * The attributes excluded from the models JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function  profile()
    {
        return $this->hasOne('Lembarek\Profile\Models\Profile');
    }

}
