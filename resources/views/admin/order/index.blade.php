@extends('admin.layout.master')
@section('content') 
<h3 style="text-align: center;">Welcom to Admin manager</h3> <br>  
  @if(session('status'))
    <div style=";color:black;width: 220px;margin-left: 400px  ">{{session('status')}}</div><br>
  @endif

<a href="{{ route('create-order')}}"class="btn btn-primary">Create</a><br><br> 
    <table class="table table-hover">
      <thead>
        <tr >
          <th style="width:5% ">ID</th>
          <th style="width:10% ">timeOrder</th>
          <th style="width:40%;text-align: center; ">address</th>
          <th style="width:5%">phone</th>
          <th style="width:5%;text-align: center;">User_id</th>
          <th style="width:5%;text-align: center;">User_id</th>
          <th style="width:5%;text-align: center;">User_id</th>
          <th style="width:10%">created_at</th>
           <th style="width:10%;text-align: center;">updated_at</th> 
          <th style="width:5%" >status</th>
          <th style="width:5%">Delete</th>


        </tr>
      </thead>
      <tbody>
       @foreach($order as $item)
      <?php 
        $user=App\User::where('id',$item->user_id)->first();
        ?>

        <tr>
          <td style="text-align: center;">{{$item->id}}</td>
          <td style="text-align: center;">{{$item->timeOrder}}</td>
           <td style="text-align: center;">{{$item->address}}</td>
           <td style="text-align: center;">{{$item->status}}</td>
          <td style="text-align: center;">{{$item->phone}}</td>
          <td style="text-align: center;">{{$user->name}}</td>
          <td style="text-align: center;">{{$item->created_at}}</td>
          <td style="text-align: center;">{{$item->updated_at}}</td>
          <td style="text-align: center;"><a href="{{route('edit-order',$item->id)}} " class="btn btn-primary">Edit</a> </td> 
           <td style="text-align: center;"> <form action="{{ route('delete-order',$item->id)}}" method="">
                @csrf
                <button type="submit" class="btn btn-danger">Delete</button> 
            </form></td>
        </tr>
        @endforeach
      </tbody>
    </table>
   
@endsection
