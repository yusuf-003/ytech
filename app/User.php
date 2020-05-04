<?php

namespace App;
use App\Post;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','photo_id','role_id','is_active'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role(){
        return $this->belongsTo('App\Role');
    }

    public function photo(){

        return $this->belongsTo('App\Photo');
    }


    public function isAdmin(){

        if($this->role->name == 'Administrator'  && $this->is_active == 1 ){

            return true;
        }else{

            return false;
        }

    }


    public function posts(){

        return $this->hasMany('App\Post');
    }

    public function Message(){

        return $this->hasMany('App\Message');
    }


    
}
