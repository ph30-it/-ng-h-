@extends('admin.layout.master')
@section('content') 
 <script >
          $(document).ready(function(){


               $('.search').keyup(function(){
                var txt =$('.search').val();
                $.post('admin/search.blade.php)',{data : txt},function(data){
                    $('danhsach').html(data);
                })
               })
          })


   </script>
 <div style="background: #66CC33;height: 40px">
      <h3 style="text-align: center;color:white " ><i>Chào mừng bạn tới trang sản phẩm </i></h3> <br>  
          </div>
                  @if(session('status'))
                 <div style="background: #66CC33;height: 50px;margin-bottom: -25px ">
                  <p style="text-align: center;color: white"><b>{{session('status')}}</b></p>
                 </div><br>
             @endif 
          <a href="{{ route('create-product')}}"class="btn btn-primary" style="margin-left: 910px;margin-top: 40px;margin-bottom: -60px">+ Add</a><br><br>
     <div class="form-inline">
                            <form class="search-form" method="post">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-search" style="width: 20px;height: 20px"></i></button>
                            </form>
                        </div>


    <table class="table table-hover" style="border: 1px solid black">
          <thead>
                <tr style="background:#666666 ;color:white;border-bottom:   ;:1px solid white" >
                   <th >ID</th>
                    <th style="text-align: center;width:25%  ">Tên sản phẩm</th>
                      <th style="text-align: center; ">Giá</th>
                         <th style="text-align: center; ">Số lượng</th>
                            <th style="text-align: center; ">Hãng</th>
                               <th style="text-align: center;">Ảnh sản phẩm</th> 
                                 <th style="text-align: center;" >Thao tác</th>
                                  <th ></th>


                   </tr>
          </thead>
          <tbody class="danhsach">
                     @foreach($products as $item)
                        <?php 
                            $img = App\Image::where('product_id',$item->id)->first();
                               $category = App\Category::where('id',$item->category_id)->first();
                       ?> 
               <tr>
                    <td style="text-align: center;"><b>{{$item->id}}</b></td>
                       <td style="text-align: center;"><b>{{$item->name}}</b></td>
                          <td style="text-align: center;"><b>{{$item->price}}.đ</b></td>
                            <td style="text-align: center;"><b>{{$item->quantity}}</b></td>
                               <td style="text-align: center;"><b>{{$category->name}}<b/></td>
                                 <td><img src="{{asset($img->path)}}" style="height: 150px;width: 200px" > </td> 
                                    <td style="text-align: center;"><a href="{{route('show-product',$item->id)}} " class="btn btn-primary">Chi tiết</a> </td> 
      <td style="text-align: center;"> <form action="{{  route('delete-product',$item->id)}}" method="">
                                     @csrf
                                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
                                    </form> 
                                       </td>
               </tr>

                  @endforeach
              </tbody>

    </table>
             <div class="pagina" >
                  <ul class="pagination" style="margin-left: 500px">
                      @if($products->currentPage() !=1)
                          <li><a href="{!!str_replace('/?','?',$products->url($products->lastPage()-1))!!}" style="font-size:120%">&laquo;</a></li>
                      @endif
                         @for($i=1;$i<=$products->lastPage();$i=$i+1)
                            <li><a href="{!!str_replace('/?','?',$products->url($i))!!}" style="font-size:120%" >{!!$i!!}|</a></li>
                         @endfor
                    @if($products->currentPage() !=$products->lastPage())
                          <li><a href="{!!str_replace('/?','?',$products->url($products->lastPage()+1))!!}" style="font-size:120%">&raquo;</a></li>
                    @endif
                </ul>
             </div>
   
@endsection 
