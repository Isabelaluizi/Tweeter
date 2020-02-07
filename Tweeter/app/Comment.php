<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table='comments';
    public function user() {
        return $this->belongsTo('App\User','user_id','id');
    }
    public function tweet() {
        return $this->belongsTo('App\Tweet','tweet_id','id');
    }
}
