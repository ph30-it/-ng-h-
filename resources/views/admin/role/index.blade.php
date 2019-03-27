@extends('admin.layout.master')
@section('content') 
<h3 style="text-align: center;">Welcom to Admin manager</h3> <br>    
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
        @foreach($role as $item)
        <tr>
          <td>{{$item->id}}</td>
          <td>{{$item->name}}</td>
          <td>{{$item->created_at}}</td>
          <td>{{$item->updated_at}}</td>
          <td><a href="{{route('edit-role',$item->id)}} " class="btn btn-primary">Edit</a> </td> 
           <td> <form action="{{ route('delete-role',$item->id)}}" method="">
                @csrf
                <button type="submit" class="btn btn-danger">Delete</button> 
            </form></td>
        </tr>
        @endforeach
      </tbody>
    </table>
@endsection
