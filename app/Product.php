<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = [
        'name', 'price', 'priceSale','quantity','description','categories_id'
    ];

    public function comments(){
    	return $this->hasMany('App\Comment');
    }

    public function order_details(){
    	return $this->hasMany('App\Order-detail');
    }

    public function images(){
    	return $this->hasMany('App\Image');
    }

    public function categories(){
    	return $this->belongTo('App\Category');
    }
}
