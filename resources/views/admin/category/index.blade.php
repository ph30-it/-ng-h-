@extends('admin.layout.master')
@section('content') 
<div style="background: #66CC33;height: 40px">
      <h3 style="text-align: center;color:white " ><i>Chào mừng bạn tới trang Category </i></h3> <br>  
          </div>
            @if(session('status'))
                 <div style="background: #66CC33;height: 50px;margin-bottom: -25px ">
                  <p style="text-align: center;color: white"><b>{{session('status')}}</b></p>
                 </div><br>
             @endif 
          <a href="{{ route('create-category')}}"class="btn btn-primary" style="margin-left: 940px;margin-top: 40px;">+ Add</a><br>
     <div class="form-inline">

    <table class="table table-hover">
      <thead>
        <tr style="background:#666666 ;color:white;border-bottom:   ;:1px solid white" >
          <th>ID</th>
          <th>Hãng</th>
          <th>Ngày nhập hàng</th>
          <th>Ngày cập nhật</th>
          <th>Action</th>
          <th></th>


        </tr>
      </thead>
      <tbody>
        @foreach($category as $item)
        <tr>
          <td>{{$item->id}}</td>
          <td>{{$item->name}}</td>
          <td>{{$item->created_at}}</td>
          <td>{{$item->updated_at}}</td>
          <td><a href="{{route('edit-category',$item->id)}} " class="btn btn-primary"><i class='fas fa-edit'></i></a> </td> 
           <td> <form action="{{ route('delete-category',$item->id)}}" method="">
                @csrf
                <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o"></i></button> 
            </form></td>
        </tr>
        @endforeach
      </tbody>
    </table>
@endsection
