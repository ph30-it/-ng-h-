@extends('admin.layout.master')
@section('content') 
<div style="background:  #66CC33;height: 40px">
     <h3 style="text-align: center;color:white"><i>Chào mừng bạn tới trang khách hàng</i></h3> <br> 
  </div> 
        @if(session('status'))
    <div style="background: #66CC33;height: 50px;margin-bottom: -25px">
      <p style="text-align: center;color:white">{{session('status')}}</p>
      </div><br>
  @endif
  <a href="{{ route('create-product')}}"class="btn btn-primary" style="margin-left: 910px;margin-top: 60px;margin-bottom: -40px">+ Add</a><br>  
  <div class="form-inline">
          <form class="search-form" method="get" action="{{route('search-user')}}">
             @csrf
                <input class="form-control mr-sm-2" type="text" placeholder="Search ..."  name='key' id='key'>
                <button class="search" type="submit"><i class="fa fa-search" style="width: 20px;height: 20px"></i></button>
            </form>
                        </div>

    <table class="table table-hover" style="">
      <thead>
        <tr style="background:#666666 ;color:white ">
          <th style="text-align: center;">ID</th>
          <th style="text-align: center;">Name</th>
          <th style="text-align: center;">Email</th>
          <th style="text-align: center;">Password</th>
          <th style="text-align: center;">Role</th>
          <th style="text-align: center;">Action</th>
          <th style="text-align: center;"></th>


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
          <td style="text-align: center;"><a href="{{route('edit-user',$item->id)}} " class="btn btn-primary"><i class="fa fa-gear"></i></a> </td> 
           <td style="text-align: center;"> <form action="{{ route('delete-user',$item->id)}}" method="">
                @csrf
                <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o"></i></button> 
            </form></td>
        </tr>
        @endforeach
      </tbody>
    </table>
@endsection
