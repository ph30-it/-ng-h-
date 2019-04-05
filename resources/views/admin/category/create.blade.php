@extends('admin.layout.master')
@section('content')
<div style="background: #66CC33;height: 40px">
      <h3 style="text-align: center;color:white " ><i>Chào mừng bạn tới trang Add Category </i></h3> <br>  
          </div>
  @if(session('status'))
                 <div style="background: #red;height: 50px;margin-bottom: -25px ">
                  <p style="text-align: center;color: red"><b>{{session('status')}}</b></p>
                 </div><br>
             @endif 
<div class="container" style="width: 400px;margin-top: 100px">
	
	<form action="{{ route('addcategory')}}" method="POST">
	@csrf
	  <div class="form-group">
	    <label for="name" style="margin-left: 150px">Tên Hãng :</label>
	    <input type="text" class="form-control" id="name" name="name">
	  </div>
	  <button type="submit" class="btn btn-default" style="margin-left: 150px;background: blue;color: white">Lưu</button>
	</form>
</div>
@endsection