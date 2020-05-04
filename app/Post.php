<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    //
   // use SoftDeletes;
  
   // protected $dates = ['deleted_at'];
    protected $fillable = [
        
            'category_id',
            'photo_id',
            'title',
            'body'
        
        ];

        public function user(){

            return $this->belongsTo('App\User');
        }

        public function photo(){

            return $this->belongsTo('App\photo');
        }

        public function category(){

            return $this->belongsTo('App\Category');
        }

        public function comments(){

            return $this->hasMany('App\Comment');
        }

        public function Author(){

            return $this->belongsTo('App\Author');
        }

        



}
