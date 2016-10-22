<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'post_id',
        'user_id',
        'content',
        'is_active'
    ];

    public function replies(){

        return $this->hasMany('App\CommentReply');

    }
}
