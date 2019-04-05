<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $fillable = [

        'name','time_order', 'address','phone', 'status','user_id','note','total'
    ];

    public function user(){
    	return $this->belongTo('App\User');
    }

    public function order_details()
    {
        return $this->hasMany('App\Order_detail');

}
}
