<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    //use SoftDeletes;
   
    //protected $dates = ['deleted_at'];

    protected $fillable = ['user_id', 'post_id', 'parent_id', 'body'];

    public function post()
    {
        return $this->belongsTo('App\User');
        return $this->belongsTo('App\Post');
    }

   // public function user()
    //{
      //  return $this->belongsTo('App\User');
   // }
   // public function replies()
   // {
     //   return $this->hasMany(Comment::class, 'parent_id');
    //}
    //

    public function user()
    {
        return $this->belongsTo(User::class);
    }
   
    /**
     * The has Many Relationship
     *
     * @var array
     */
    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }

   
}
