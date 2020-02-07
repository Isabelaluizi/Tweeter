<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $table='likes';

    public function user() {
        return $this->belongsTo('App\User','user_id','id');
    }
    public function tweet() {
        return $this->belongsTo('App\Tweet','tweet_id','id');
    }
}
