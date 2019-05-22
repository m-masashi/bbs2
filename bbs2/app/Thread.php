<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
  //代入許可
  protected $fillable = [
    'title',
    'body',
    'cat1',
    'cat2',
    'flag',
    'position01',
    'position02',
    'position03',
  ];

  public function post()
  {
    return $this->hasMany('App\Post');
  }
}
