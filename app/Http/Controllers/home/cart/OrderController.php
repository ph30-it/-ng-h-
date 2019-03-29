<?php

namespace App\Http\Controllers\home\cart;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PaymentRequest;
use Auth;
use App\Product;
use App\Order;
use App\Order_detail;
use Cart;
use Mail;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $a = Auth::user()->email;
        if(Auth::check()){
            return view('home.cart.checkout');
        }else{
            return redirect()->intended('account')->with('status','Bạn phải đăng nhập mới được sử dụng chức năng Order!');
        }

    }

    public function postpayment(PaymentRequest $request)
    {
      $data = $request->all();
      $order  = Order::create([
        'name'=> $data['name'],
        'address'=> $data['address'],
        'phone'=> $data['phone'],
        'note'=> $data['note'],
        'user_id'=> Auth::user()->id,
      ]);
      $carts  = Cart::getcontent();
    foreach($carts as $cart)
      {
          $order_detail = new Order_detail;
          $order_detail->order_id   = $order->id;
          $order_detail->product_id = $cart->id;
          $order_detail->quantity   = $cart->quantity;
          $order_detail->price      = $cart->price;
          $order_detail->save();
      }
      $data = [
        'name' => $request->name,
        'phone' => $request->phone,
        'address' => $request->address,
        'total_price' => Cart::getTotal(),
        'quantity' => Cart::getTotalQuantity(),
      ];
      Mail::send('email.order',$data,function($msg) use($data){
        $msg->from('quanqb.it@gmail.com',"QV_Watch");
        $msg->to(Auth::user()->email)->subject('Cảm ơn bạn đã đặt hàng!Chúng tôi sẽ liên hệ với bạn thời gian sớm nhất');
      });
        Cart::clear();
        echo "<script>alert('Bạn đã đặt hàng thành công!')
        window.location ='".url('/')."';
        </script>";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
