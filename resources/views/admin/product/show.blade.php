@extends('admin.layout.master')
@section('content') 
<div style="background:  #66CC33;height: 40px">
      <h3 style="text-align: center;color:white"><i>Chi tiết sản phẩm</i></h3><br>  
</div>
        <a href="{{ route('create-product')}}"class="btn btn-primary" style="margin-left: 1000px;margin-top:20px;margin-bottom: -20px">+ Add</a><br><br>
             @if(session('status'))
              <div style="background: #00CC66; height: 50px;margin-bottom: -25px ">
                  <p style="text-align: center;color: black">
                  {{session('status')}}</p>
              </div><br>
             @endif 
    <table class="table table-hover" style="border: 1px solid black">
      <thead>
        <tr style="background: #999999;" >
          <th >ID</th>
          <th style="text-align: center;border-left: 1px solid black ">Name</th>
          <th style="text-align: center;border-left: 1px solid black ">Price</th>
          <th style="text-align: center;border-left: 1px solid black ">PriceSale</th>
          <th style="text-align: center;border-left: 1px solid black; ">Quantity</th>
          <th style="text-align: center;border-left: 1px solid black ">description</th>
          <th style="text-align: center;border-left: 1px solid black ">Category</th>
          <th style="text-align: center;border-left: 1px solid black">Imane</th> 
          <th style="text-align: center;border-left: 1px solid black" >Action</th>
          <th ></th>


        </tr>
      </thead>
      <tbody>
       @foreach($products as $item)
       <?php 
            $img = App\Image::where('product_id',$item->id)->first();
            $category = App\Category::where('id',$item->category_id)->first();
         ?> 
        <tr>
          <td style="text-align: center;border-left: 1px solid black">{{$item->id}}</td>
          <td style="text-align: center;border-left: 1px solid black">{{$item->name}}</td>
          <td style="text-align: center;border-left: 1px solid black">{{$item->price}}đ</td>
          <td style="text-align: center;border-left: 1px solid black">{{$item->priceSale}}đ</td>
          <td style="text-align: center;border-left: 1px solid black">{{$item->quantity}}</td>
         <td style="text-align: center;border-left: 1px solid black">{{$item->description}}</td> 
          <td style="text-align: center;border-left: 1px solid black">{{$category->name}}</td>
          <td style="text-align: center;border-left: 1px solid black"><img src="{{asset($img->path)}}" style="width:900px"></td>
          
          <td style="text-align: center;border-left: 1px solid black"><a href="{{route('edit-product',$item->id)}} " class="btn btn-primary" ><i class='fas fa-edit'></i></a> </td> 
           <td style="text-align: center;"> <form action="{{ route('delete-product',$item->id)}}" method="">
                @csrf
                <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o" ></i></button> 
            </form></td>
        </tr>
        @endforeach
      </tbody>
    </table>
   
@endsection
