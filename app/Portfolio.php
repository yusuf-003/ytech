<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $fillable = [
        
        'service_id',
        'photo_id',
        'title'
       
    ];

    public function photo(){

        return $this->belongsTo('App\photo');
    }

    public function service(){

        return $this->belongsTo('App\Service');
    }
}
