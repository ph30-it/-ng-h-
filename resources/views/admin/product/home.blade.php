@extends('admin.layout.master')
@section('content') 
<h3 style="text-align: center;">Welcom to Admin manager</h3> <br>  
  @if(session('status'))
    <div style=";color:black;width: 220px;margin-left: 400px  ">{{session('status')}}</div><br>
  @endif

<a href="{{ route('create-product')}}"class="btn btn-primary">Create</a><br><br> 
    <table class="table table-hover">
      <thead>
        <tr >
          <th style="width:5% ">ID</th>
          <th style="width:10%;text-align: center; ">Name</th>
          <th style="width:5%;text-align: center; ">Price</th>
          <th style="width:2%" >PriceSale</th>
          <th style="width:3%">Quantity</th>
          <th style="width:30%;text-align: center;">Description</th>
          <th style="width:2%">Categories_id</th>
           <th style="width:35%;text-align: center;">Image</th> 
          <th style="width:3%">Edit</th>
          <th style="width:5%">Delete</th>


        </tr>
      </thead>
      <tbody>
       @foreach($products as $item)
        <?php 
            $img = App\Image::where('product_id',$item->id)->first();
            $category = App\Category::where('id',$item->category_id)->first();
         ?> 
        <tr>
          <td style="text-align: center;">{{$item->id}}</td>
          <td style="text-align: center;">{{$item->name}}</td>
          <td style="text-align: center;">{{$item->price}}đ</td>
          <td style="text-align: center;">{{$item->priceSale}}%</td>
          <td style="text-align: center;">{{$item->quantity}}</td>
          <td style="text-align: center;">
            <textarea name="comment" rows="4" cols="30">{{$item->description}}</textarea>
          </td>
          <td style="text-align: center;">{{$category->name}}</td>
          
        <td>
           <img src="{{asset($img->path)}}" >  
            </td> 
          <td style="text-align: center;"><a href="{{route('edit-product',$item->id)}} " class="btn btn-primary">Edit</a> </td> 
           <td style="text-align: center;"> <form action="{{ route('delete-product',$item->id)}}" method="">
                @csrf
                <button type="submit" class="btn btn-danger">Delete</button> 
            </form></td>
        </tr>
        @endforeach
      </tbody>
    </table>
   
@endsection
