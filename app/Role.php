<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'name'
    ];

    public function user() {
        return $this->hasOne('App\User', 'role_id');
    }

    public function one_to_many_users() {
        return $this->hasMany('App\User', 'id');
    }
}
