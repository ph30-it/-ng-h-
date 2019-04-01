<?php

namespace App\Http\Controllers\Admin\order;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;
use App\User;
use App\Order_detail;
use App\Product;
class OrderController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $order=Order::paginate(5);
        $order=Order::all();
        return view('admin.order.index',compact('order'));
        
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
        $order= Order::find($id)->order_details;
        $product=Product::pluck('id','name');
        return view('admin.order.edit', compact('order','product'));
    }

    /**
     * 
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       try{
        $order = Order::find($id);
        $data= $request->all();
        $order->update($data);
        return redirect()->route('index-order')->with('status','xữ lý đơn hàng thành công');
       }
         catch(\Exception $e) {
            return redirect()->route('edit-order')->with('status','xữ lý đơn hàng thất bại');

         } 

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function destroy($id){


        $order=Order::find($id);
        if ($order!=null) {
           
      
        $order->delete();
        return redirect()->route('index-order')->with('status','xóa đơn hàng thành công');
    }
    return redirect()->route('index-order')->with('status','xóa đơn hàng thất bại');

    }
}
