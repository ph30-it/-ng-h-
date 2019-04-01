@extends('admin.layout.master')
@section('content') 
<div style="background:  #66CC33;height: 40px">
     <h3 style="text-align: center;color:white"><i>Chào mừng bạn tới trang đặt hàng</i></h3> <br> 
  </div> 
        @if(session('status'))
    <div style="background: #66CC33;height: 50px;margin-bottom: -25px">
      <p style="text-align: center;color:white">{{session('status')}}</p>
      </div><br>
  @endif

<a href="{{ route('create-order')}}"class="btn btn-primary" style="margin-left: 990px;margin-bottom: -20px;margin-top: 10px"><b>+ Add</b></a><br><br> 
    <table class="table table-hover">
      <thead>
        <tr style="background:#666666 ;color:white" >
          <th style="text-align: center; ">ID</th>
             <th style=" text-align: center;">Ngày đặt hàng</th>
               <th style="text-align: center; ">Địa chỉ</th>
                 <th style="text-align: center;">Số điện thoại</th>
                    <th style="text-align: center;">Khách hàng</th>
                      <th style="text-align: center;" >Trạng thái</th>
                        <th style="text-align: center;" >Thao tác</th>
                          <th style="text-align: center;"></th>


          </tr>
        </thead>
        <tbody>
       @foreach($order as $item)
      <?php 
        $user=App\User::where('id',$item->user_id)->first();
        ?>

          <tr>
            <td style="text-align: center;"><b>{{$item->id}}</b></td>
                <td style="text-align: center;">{{$item->created_at}}</td>
                   <td style="text-align: center;"><b>{{$item->address}}</b></td>
                       <td style="text-align: center;"><b>{{$item->phone}}</b></td>
                         <td style="text-align: center;"><b>{{$user->name}}</b></td>
                           <td style="text-align: center;color: red"><b>{{$item->status}}</b></td>
                             <td style="text-align: center;"><a href="{{route('edit-order',$item->id)}} " class="btn btn-primary"><i class='fas fa-edit'></i></a> </td> 
                                 <td style="text-align: center;"> <form action="{{ route('delete-order',$item->id)}}" method="">
                @csrf
                <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o"></i></button> 
            </form></td>
        </tr>
        @endforeach
      </tbody>
    </table>
      <div class="pagina" >
                  <ul class="pagination" style="margin-left: 500px">
                      @if($order->currentPage() !=1)
                          <li><a href="{!!str_replace('/?','?',$order->url($order->lastPage()-1))!!}" style="font-size:120%">&laquo;</a></li>
                      @endif
                         @for($i=1;$i<=$order->lastPage();$i=$i+1)
                            <li><a href="{!!str_replace('/?','?',$order->url($i))!!}" style="font-size:120%" >{!!$i!!}|</a></li>
                         @endfor
                    @if($order->currentPage() !=$order->lastPage())
                          <li><a href="{!!str_replace('/?','?',$order->url($order->lastPage()+1))!!}" style="font-size:120%">&raquo;</a></li>
                    @endif
                </ul>
             </div>
   
@endsection
