@extends('admin.layout.master')
@section('content') 
<h3 style="text-align: center;">Welcom to Admin manager</h3> <br>    
    <table class="table table-hover">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Price</th>
          <th>PriceSale</th>
          <th>Quantity</th>
          <th>Description</th>
          <th>Categories_id</th>
           <th>Image</th>
          <th>Edit</th>
          <th>Delete</th>


        </tr>
      </thead>
      <tbody>
        @foreach($products as $item)
        <tr>
          <td>{{$item['id']}}</td>
          <td>{{$item['name']}}</td>
          <td>{{$item['price']}}</td>
          <td>{{$item['priceSale']}}</td>
          <td>{{$item['quantity']}}</td>
          <td>{{$item['description']}}</td>
          <td>{{$item['categories_id']}}</td>
         
          <td> <img src="{{asset($item['images'][0]['path'])}}">   </td>
            
          <td><a href="{{route('edit-product',$item['id'])}} " class="btn btn-primary">Edit</a> </td> 
           <td> <form action="{{ route('delete',$item['id'])}}" method="">
                @csrf
                <button type="submit" class="btn btn-danger">Delete</button> 
            </form></td>
        </tr>
        @endforeach
      </tbody>
    </table>
   <a href="{{ route('create-product')}}"class="btn btn-primary">Create</a>
@endsection
