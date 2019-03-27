@extends('admin.layout.master')
@section('content') 
<h3 style="text-align: center;">Welcom to Admin manager</h3> <br> 
@if(session('status'))
   <div style=";color:black;width: 220px;margin-left: 400px;text-align: center;  ">{{session('status')}}</div><br>
@endif   
    <table class="table table-hover" style="width: 900px">
      <thead>
        <tr>
          <th style="text-align: center;">ID</th>
          <th style="text-align: center;">Name</th>
          <th style="text-align: center;">Email</th>
          <th style="text-align: center;" >Email_verified_at</th>
          <th style="text-align: center;">Password</th>
          <th style="text-align: center;">Remember_token</th>
          <th style="text-align: center;">Created_at</th>
           <th style="text-align: center;">Updated_at</th>
          <th style="text-align: center;">Role_id</th>
          <th style="text-align: center;">Edit</th>
          <th style="text-align: center;">Delete</th>


        </tr>
      </thead>
      <tbody>
        @foreach($user as $item)
        <tr>
          <td style="text-align: center;">{{$item->id}}</td>
          <td style="text-align: center;">{{$item->name}}</td>
          <td style="text-align: center;">{{$item->email}}</td>
          <td style="text-align: center;">{{$item->email_verified_at}}</td>
          <td style="text-align: center;">{{$item->password}}</td>
          <td style="text-align: center;">{{$item->remember_token}}</td>
          <td style="text-align: center;">{{$item->created_at}}</td>
          <td style="text-align: center;">{{$item->updated_at}}</td>
          <td style="text-align: center;">{{$item->role_id}}</td>
          <td style="text-align: center;"><a href="{{route('edit-user',$item->id)}} " class="btn btn-primary">Edit</a> </td> 
           <td style="text-align: center;"> <form action="{{ route('delete-user',$item->id)}}" method="">
                @csrf
                <button type="submit" class="btn btn-danger">Delete</button> 
            </form></td>
        </tr>
        @endforeach
      </tbody>
    </table>
   <a href="{{ route('create-user')}}"class="btn btn-primary" style="">Create</a>
@endsection
