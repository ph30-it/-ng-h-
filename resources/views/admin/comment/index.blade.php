@extends('admin.layout.master')
@section('content') 
<h3 style="text-align: center;"><b>Comment Table</b></h3> <br>  
  @if(session('status'))
            <div style=";color:black;background: #00CC66;height: 50px;margin-bottom: -25px ">
                   <p style="color: white;text-align: center;"> {{session('status')}}</p>
            </div><br>
  @endif
    <table class="table table-hover">
      <thead>
        <tr  style="background:#666666 ;color:white">
          <th style="text-align: center; ">ID</th>
          <th style="text-align: center;">Title</th>
          <th style="text-align: center; ">Content</th>
          <th style="text-align: center;">product</th>
          <th style="text-align: center;">User</th>
          <th style="text-align: center;">created_at</th>
          <th style="text-align: center;">Action</th>
          <th style="text-align: center;"></th>


        </tr>
      </thead>
      <tbody>
       @foreach($comment as $item)
      <?php 
        $products=App\Product::where('id',$item->product_id)->first();
        $user=App\User::where('id',$item->user_id)->first();
        ?>

        <tr>
          <td style="text-align: center;"><b>{{$item->id}}</b></td>
             <td style="text-align: center;"><b>{{$item->title}}</b></td>
                <td style="text-align: center;">
                     {{$item->content}}
                            </td>
                       <td style="text-align: center;"><b>{{$products->name}}</b></td>
                          <td style="text-align: center;"><b>{{$user->name}}</b></td>
                             <td style="text-align: center;">{{$item->created_at}}</td>
                                  <td style="text-align: center;"><a href="{{route('edit-comment',$item->id)}} " class="btn btn-primary"><i class="fa fa-gear"></i></a> </td> 
                                       <td style="text-align: center;"> <form action="{{ route('delete-comment',$item->id)}}" method="">
                                      @csrf
                              <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o"></i></button> 
            </form></td>
        </tr>
        @endforeach
      </tbody>
    </table>
      <div class="pagina" >
                  <ul class="pagination" style="margin-left: 500px">
                      @if($comment->currentPage()!=1)
                          <li><a href="{!!str_replace('/?','?',$comment->url($comment->lastPage()-1))!!}" style="font-size:120%">&laquo;</a></li>
                      @endif
                         @for($i=1;$i<=$comment->lastPage();$i=$i+1)
                            <li><a href="{!!str_replace('/?','?',$comment->url($i))!!}" style="font-size:120%" >{!!$i!!}|</a></li>
                         @endfor
                    @if($comment->currentPage()!=$comment->lastPage())
                          <li><a href="{!!str_replace('/?','?',$comment->url($comment->lastPage()+1))!!}" style="font-size:120%">&raquo;</a></li>
                    @endif
                </ul>
             </div>
   
@endsection
