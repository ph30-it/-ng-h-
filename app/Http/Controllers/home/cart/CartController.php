<?php

namespace App\Http\Controllers\home\cart;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Product;
use Cart;
use Session;

class CartController extends Controller
{
    
    public function addcart($id){
        $product_buy = Product::with('images')->where('id',$id)->first();      
        //dd($product_buy->images['0']['path']);
        Cart::add(array(
            'id'=>$id, 
            'name'=>$product_buy->name, 
            'quantity'=>1, 
            'price'=>($product_buy->price)-(($product_buy->price)*($product_buy->priceSale)/100), 
            'attributes'=> array('image' =>$product_buy->images['0']['path'])
        ));

        return redirect()->back();
    }
    public function index(){
        $content = Cart::getcontent();
        //dd($content);
        $total = Cart::gettotal();
        if(Cart::getTotalQuantity() == 0)
        {
            echo "<script>alert('Chưa có sản phẩm trong giỏ hàng. Vui lòng chọn sản phẩm!')
            window.location ='".url('/')."';
            </script>";
        }
        return view('home.cart.index', compact('content', 'total'));
    }
    //tang sl san pham
    public function increase($id){
        Cart::update($id, array('quantity'=> 1));
        return redirect()->route('cart-index');
    }
    //giam so luong san pham
    public function reduction($id){
        Cart::update($id, array('quantity'=> -1));
        return redirect()->route('cart-index');
    }

    public function updatecart(Request $request)
   {
        if(Request::ajax()){
            $id = Request::get('id');
            $qty = Request::get('quantity');
            Cart::update($id,$qty);
        }
        
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
        Cart::remove($id);
        return redirect()->back();
    }
}
