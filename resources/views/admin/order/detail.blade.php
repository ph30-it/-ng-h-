@extends('admin.layout.master')
@section('content')
<div class="container">
	
	<div style="background:  #66CC33;height: 40px">
        <h3 style="text-align: center;color:white"><i>Chi tiết đơn đặt hàng</i></h3> <br> 
  </div> 
        @if(session('status'))
    <div style="background: #66CC33;height: 50px;margin-bottom: -25px ">
        <p style="text-align: center;color: red">{{session('status')}}</p>
    </div><br>
  @endif
    <div style="margin-left: 1000px;margin-top: 40px;margin-bottom: -55px">
      <a href="{{route('index-order')}} " class="btn btn-primary"><i class='fas fa-arrow-circle-left'></i></a> </td> 
   </div>
    <table class="table table-hover" style="margin-top: 60px">
      <thead>
        <tr style="background:#666666 ;color:white" >
          <th style="text-align: center; ">ID</th>
           <th style="text-align: center;width:25% ">Tên sản phẩm</th>
            <th style=" text-align: center;">Ảnh sản phẩm</th>
             <th style=" text-align: center;">Số lượng</th>
               <th style=" text-align: center;"></th> 
               <th style="text-align: center; ">Giá</th>
                 <th style="text-align: center;">Tổng hóa đơn</th>
                 <th style="text-align: center;"></th>		
          </tr>
        </thead>
        <tbody>
       @foreach($order_detail as $item)
          <?php    
              $product=App\Product::where('id',$item->product_id)->first();
              $image=App\Image::where('product_id',$item->product_id)->first();
          ?>
          <tr>
            <td style="text-align: center;"><b>{{$item->id}}</b></td>
                 <td style="text-align: center;"><b>{{$product->name}}</b></td>
                    <td style="text-align: center;"><img src="{{asset($image->path)}}" style="width: 150px"></td>
                   <td style="text-align: center;"><b>{{$item->quantity}}</b></td>
                      <td style="text-align: center;"> X</td>
                       <td style="text-align: center;"><b>{{ number_format ($item->price)}}.đ</b></td>
                           <td style="text-align: center;"><b><?php $tich=($item->quantity)*($item->price);echo number_format($tich); ?>.đ</b></td>
              <td style="text-align: center;"> 
                <form action="{{ route('delete-order',$item->id)}}" method="">
                @csrf
                <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o"></i>
              </button> 
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>

</div>
 <div style="margin-left: 850px" > <span><b>Tổng hóa đơn:{{  number_format($item->order->total)}}.đ </b></span> </div>
 <form action="{{ route('update-order',$item->order->id)}}" method="POST" ype="multipart/form-data">
	   @csrf
	   @method('PUT')
    <div class="action" style="text-align: center;">
    	<label for="status">Xử lý đơn hàng:</label>
	      <select name="status" id="status">
	        <option value="{{$item->status}}">{{$item->status}}</option>
	    		<option value="Đã nhận đơn ">Đã nhận đơn</option>
	    		<option value="Đã giao hàng ">Đã giao hàng </option>
	    		<option value="Đã hủy đơn ">Đã hũy đơn</option>
	     </select><br>
	         <button type="submit" class="btn btn-default" style="background: blue;color: white;"><b>Lưu <i class='fas fa-vote-yea'></i>
           </button>


    </div>
	</form>

@endsection