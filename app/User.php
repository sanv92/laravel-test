<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'role_id', 'is_active', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role() {
        return $this->belongsTo('App\Role', 'role_id');
    }

    public function roles() {
        return $this->belongsTo('App\Role', 'role_id');
    }

    public function one_to_many_roles() {
        return $this->hasMany('App\Role', 'id');
    }

    public function posts() {
        return $this->hasMany('App\Posts');
    }

    public function comments() {
        return $this->hasMany('App\Comment', 'user_id');
    }

    public function isAdmin() {

        if ($this->role->name === 'administrator' && $this->is_active === 1) {
            return true;
        }

        return false;

    }
}
