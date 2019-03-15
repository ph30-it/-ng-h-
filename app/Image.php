<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    //
    protected $fillable = [
        'path', 'product_id', 
    ];

    public function products(){
    	return $this->belongTo('App\Product');
    }
}
