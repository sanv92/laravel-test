<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'user_id',
        'category_id',
        'title',
        'content',
    ];

    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }

    public function categories(){
        return $this->belongsTo('App\Categories', 'category_id');
    }

/*    public function user() {
        return $this->belongsTo('App\User');
    }*/

}
