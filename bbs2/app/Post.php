<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [ 
        'title',
        'body',
        'thread_id',
        'position',
        'post_num',
        'ip',
        'hash_id',
    ];

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
