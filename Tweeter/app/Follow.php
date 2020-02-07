<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    protected $table='follows';
    public $timestamps=false;
    public function user() {
        return $this->belongsTo('App\User','user_id','id');
    }
}
