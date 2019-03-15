<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $fillable = [
        'title', 'content', 'rate','product_id','user_id'
    ];

    public function user(){
    	return $this->belongTo('App\User');
    }

    public function products(){
    	return $this->belongTo('App\Product');
    }
}
