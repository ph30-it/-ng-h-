<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $fillable = [
        'name','time_Order', 'address','phone', 'status','user_id','note','total'
    ];

    public function user(){
    	return $this->belongTo('App\User');
    }

    public function order_details()
    {
        return $this->hasOne('App\Order_details');
    }
}
