<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $fillable = [
        'time_Order', 'address', 'status','user_id','total'
    ];

    public function user(){
    	return $this->belongTo('App\User');
    }

    public function order_details()
    {
        return $this->hasMany('App\Order_detail');
    }
}
