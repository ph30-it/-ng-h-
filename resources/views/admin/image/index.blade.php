@extends('admin.layout.master')
@section('content') 
<h3 style="text-align: center;">Welcom to Admin manager</h3> <br>
@if(session('status'))   
<div style="color:black;width: 220px;margin-left: 400px  ">{{session('status')}}</div><br>
@endif 
    <table class="table table-hover">
      <thead>
        <tr>
          <th>ID</th>
          <th>Path</th>
          <th>Product_id</th>
          <th>Created-at</th>
          <th>Update-at</th>
          <th>Edit</th>
          <th>Delete</th>


        </tr>
      </thead>
      <tbody>
        @foreach($image as $item)
        <tr>
          <td>{{$item->id}}</td>
          <td style="width:100px"> <img src="{{asset($item->path)}}"> </td>
           <td>{{$item->product_id}}</td>
          <td>{{$item->created_at}}</td>
          <td>{{$item->updated_at}}</td>
          <td><a href="{{route('edit-image',$item->id)}} " class="btn btn-primary">Edit</a> </td> 
           <td> <form action="{{ route('delete-image',$item->id)}}" method="">
                @csrf
                <button type="submit" class="btn btn-danger">Delete</button> 
            </form></td>
        </tr>
        @endforeach
      </tbody>
    </table>
   <a href="{{route('create-image',$item->id) }}"class="btn btn-primary">Create</a>
@endsection
