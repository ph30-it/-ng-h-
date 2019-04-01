@extends('admin.layout.master')
@section('content') 
<h3 style="text-align: center;"><b>User Table</b></h3> <br> 
<a href="{{ route('create-user')}}"class="btn btn-primary" style="margin-left: 900px;background: #0000FF;margin-bottom: 10px"><b>+ Add</b></a>
@if(session('status'))
   <div style="background:#00CC66 ;width: 900px;margin-left: 100px;text-align: center;height: 50px;margin-bottom: -20px">   <p style="color: white">{{session('status')}}</p>
   </div><br>
@endif   
    <table class="table table-hover" style="width: 900px;margin-left: 100px">
      <thead>
        <tr style="background:#666666 ;color:white ">
          <th style="text-align: center;">ID</th>
          <th style="text-align: center;">Name</th>
          <th style="text-align: center;">Email</th>
          <th style="text-align: center;">Password</th>
          <th style="text-align: center;">Role</th>
          <th style="text-align: center;">Action</th>
          <th style="text-align: center;">Delete</th>


        </tr>
      </thead>
      <tbody>
        @foreach($user as $item)
        <?php $role=App\Role::where('id',$item->role_id)->first()   ?>
        <tr>
          <td style="text-align: center;"><b>{{$item->id}}</b></td>
          <td style="text-align: center;"><b>{{$item->name}}</b></td>
          <td style="text-align: center;"><b>{{$item->email}}</b></td>
          <td style="text-align: center;"><b>{{$item->password}}</b></td>
          <td style="text-align: center;"><b>{{$role->name}}</b></td>
          <td style="text-align: center;"><a href="{{route('edit-user',$item->id)}} " class="btn btn-primary">show</a> </td> 
           <td style="text-align: center;"> <form action="{{ route('delete-user',$item->id)}}" method="">
                @csrf
                <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o"></i></button> 
            </form></td>
        </tr>
        @endforeach
      </tbody>
    </table>
@endsection
