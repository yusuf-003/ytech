<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    //


    public function posts(){

        return $this->hasMany('App\Post');
    }

    public function photo(){

        return $this->belongsTo('App\Photo');
    }
}
