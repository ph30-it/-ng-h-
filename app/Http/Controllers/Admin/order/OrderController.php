<?php

namespace App\Http\Controllers\Admin\order;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;
use App\Order;
use App\User;
use App\Order_detail;
use App\Product;
use App\Image;
use Auth;
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
        Order::orderBy('created_at','DESC');
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
     public function detail($id)
    {
        $order_detail=Order_detail::with('order')->where('order_id',$id)->get();
        return view('admin.order.detail', compact('order_detail'));
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
        $order=Order::find($id);
        $data= $request->all();
        $order->update($data);
        return redirect()->route('index-order')->with('status','xữ lý đơn hàng thành công');
       }
         catch(\Exception $e) {
            return redirect()->route('detail-order')->with('status','xữ lý đơn hàng thất bại');

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
    public function search(Request $request){
     $order=Order::where('name','like',$request->key)->orWhere('status',$request->key)->get();
     
     return view('admin.order.search',compact('order'));
    }
}
