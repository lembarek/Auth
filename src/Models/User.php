<?php

 namespace Lembarek\Auth\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Lembarek\Role\Traits\Roleable;
use Lembarek\Auth\Models\User;

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

    /**
     * check if the current user is supurior then $user
     *
     * @param  User  $user
     * @return boolean
     */
    public function isSuperiorThen($user)
    {
        if( ! $this->maxRole()) return false;
        if( ! $user->maxRole()) return true;
        return $this->maxRole()->order > $user->maxRole()->order;
    }

    /**
     * return the most supurior role for a user
     *
     * @return Lembarek\Role\Models\Role
     */
    public function maxRole()
    {
        $roles = $this->roles();
        $r = $roles->first();

        foreach ($roles as $role){
            if($role->order > $r->order)
                $r = role;
        }

        return $r;
    }

}
