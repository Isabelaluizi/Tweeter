<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    public function follows() {
        return $this->hasMany('App\Follow','user_id','id');
    }

    public function tweets() {
        return $this->hasMany('App\Tweet','user_id','id');
    }

    public function comments() {
        return $this->hasMany('App\Comment','user_id','id');
    }

    public function likes() {
        return $this->hasMany('App\Like','user_id','id');
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
