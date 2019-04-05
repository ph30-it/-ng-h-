@extends('admin.layout.master')
@section('content')
<div style="background: #66CC33;height: 40px">
      <h3 style="text-align: center;color:white " ><i>Chào mừng bạn tới trang Edit Category </i></h3> <br>  
          </div>
  @if(session('status'))
                 <div style="background: #red;height: 50px;margin-bottom: -25px ">
                  <p style="text-align: center;color: red"><b>{{session('status')}}</b></p>
                 </div><br>
             @endif 
<div class="container" style="width: 400px;margin-top: 50px">
	
	<form action="{{ route('update-category', $category->id)}}" method="POST">
	@csrf
	@method('PUT')
	  <div class="form-group" >
	    <label for="name" style="margin-left: 150px;">Tên Hãng :</label>
	    <input type="text" class="form-control" id="name" name="name"  value="{{ $category->name }}">
	  </div>
	    <button type="submit" class="btn btn-default " style="background: blue;color: white;margin-left: 150px" >Thay đổi</button>
	  </div>
	</form>
</div>
@endsection