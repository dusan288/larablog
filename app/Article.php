<?php

namespace App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    protected $fillable = [
      'content', 'user_id', 'title'
    ];
    public function user()
    {
      return $this->belongsTo('App\User');
    }

    public function comments()
    {
      return $this->hasMany('App\Comment');
    }
}
