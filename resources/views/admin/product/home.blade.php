@extends('admin.layout.master')
@section('content') 
<h3 style="text-align: center;">Welcom to Admin manager</h3> <br>    
    <table class="table table-hover">
      <thead>
        <tr>
          <th style="text-align: center;">ID</th>
          <th style="text-align: center;">Name</th>
          <th style="text-align: center;">Price</th>
          <th style="text-align: center;" >PriceSale</th>
          <th style="text-align: center;">Quantity</th>
          <th style="text-align: center;">Description</th>
          <th style="text-align: center;">Categories_id</th>
           <th style="text-align: center;">Image</th>
          <th style="text-align: center;">Edit</th>
          <th style="text-align: center;">Delete</th>


        </tr>
      </thead>
      <tbody>
        @foreach($products as $item)
        <?php 
            $img = App\Image::where('product_id',$item->id)->first();
         ?>
        <tr>
          <td style="text-align: center;">{{$item->id}}</td>
          <td style="text-align: center;">{{$item->name}}</td>
          <td style="text-align: center;">{{$item->price}}</td>
          <td style="text-align: center;">{{$item->priceSale}}</td>
          <td style="text-align: center;">{{$item->quantity}}</td>
          <td style="text-align: center;">{{$item->description}}</td>
          <td style="text-align: center;">{{$item->category_id}}</td>
          
          <td style="text-align: center;">
           <img src="{{asset($img->path)}}">  
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
   <a href="{{ route('create-product')}}"class="btn btn-primary">Create</a>
@endsection
