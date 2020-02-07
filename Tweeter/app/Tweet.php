<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    protected $table='tweets';

    public function likes() {
        return $this->hasMany('App\Like','tweet_id','id');
    }
    public function comments() {
        return $this->hasMany('App\Comment','tweet_id','id');
    }
    public function user() {
        return $this->belongsTo('App\User','user_id','id');
    }

}
