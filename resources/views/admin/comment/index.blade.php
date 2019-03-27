@extends('admin.layout.master')
@section('content') 
<h3 style="text-align: center;">Welcom to Admin manager</h3> <br>  
  @if(session('status'))
    <div style=";color:black;width: 220px;margin-left: 400px  ">{{session('status')}}</div><br>
  @endif

<a href="{{ route('create-comment')}}"class="btn btn-primary">Create</a><br><br> 
    <table class="table table-hover">
      <thead>
        <tr >
          <th style="width:5% ">ID</th>
          <th style="width:10% ">Title</th>
          <th style="width:40%;text-align: center; ">Content</th>
          <th style="width:5%" >Rate</th>
          <th style="width:5%">product_id</th>
          <th style="width:5%;text-align: center;">User_id</th>
          <th style="width:10%">created_at</th>
           <th style="width:10%;text-align: center;">updated_at</th> 
          <th style="width:5%">Edit</th>
          <th style="width:5%">Delete</th>


        </tr>
      </thead>
      <tbody>
       @foreach($comment as $item)
      <?php 
        $products=App\Product::where('id',$item->product_id)->first();
        $user=App\User::where('id',$item->user_id)->first();
        ?>

        <tr>
          <td style="text-align: center;">{{$item->id}}</td>
          <td style="text-align: center;">{{$item->title}}</td>
          <td style="text-align: center;">
            <textarea name="comment" rows="4" cols="30">{{$item->content}}</textarea>
          </td>
          <td style="text-align: center;">{{$item->rate}}</td>
          <td style="text-align: center;">{{$products->name}}</td>
          <td style="text-align: center;">{{$user->name}}</td>
          <td style="text-align: center;">{{$item->created_at}}</td>
          <td style="text-align: center;">{{$item->updated_at}}</td>
          <td style="text-align: center;"><a href="{{route('edit-comment',$item->id)}} " class="btn btn-primary">Edit</a> </td> 
           <td style="text-align: center;"> <form action="{{ route('delete-comment',$item->id)}}" method="">
                @csrf
                <button type="submit" class="btn btn-danger">Delete</button> 
            </form></td>
        </tr>
        @endforeach
      </tbody>
    </table>
   
@endsection
