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
          <th>Name</th>
          <th>Created-at</th>
          <th>Update-at</th>
          <th>Edit</th>
          <th>Delete</th>


        </tr>
      </thead>
      <tbody>
        @foreach($category as $item)
        <tr>
          <td>{{$item->id}}</td>
          <td>{{$item->name}}</td>
          <td>{{$item->created_at}}</td>
          <td>{{$item->updated_at}}</td>
          <td><a href="{{route('edit-category',$item->id)}} " class="btn btn-primary">Edit</a> </td> 
           <td> <form action="{{ route('delete-category',$item->id)}}" method="">
                @csrf
                <button type="submit" class="btn btn-danger">Delete</button> 
            </form></td>
        </tr>
        @endforeach
      </tbody>
    </table>
   <a href="{{route('create-category',$item->id) }}"class="btn btn-primary">Create</a>
@endsection
