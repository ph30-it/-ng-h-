<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $fillable = [
        'name','email', 'content', 'rate','product_id','user_id'
    ];

    public function user(){
    	return $this->belongTo('App\User');
    }

    public function product(){
    	return $this->belongTo('App\Product');
    }
}
