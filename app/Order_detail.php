<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order_detail extends Model
{
    //
    protected $fillable = [
        'quantity', 'price', 'product_id','order_id'
    ];

    public function products(){
    	return $this->belongTo('App\Product');
    }

    public function order()
    {
        return $this->belongsTo('App\Order');
    }
}
