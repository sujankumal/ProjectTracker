<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    //protected $table = 
    protected $fillable = [
        'name', 'email', 'password','batch','confirmed',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function project_details(){
        return $this->belongsToMany('App\project_detail');
    }
    public function verifyUser()
    {
        return $this->hasOne('App\VerifyUser');
    }
}
