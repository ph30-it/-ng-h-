@extends('admin.layout.master')
@section('content')
   <div style="background:  #66CC33;height: 40px">
     <h3 style="text-align: center;color:white"><i>ADD User</i></h3> <br> 
  </div> 
       @if(session('status'))
            <div style="background: #00CC66;height: 50px;margin-bottom: -25px ">
                  <p style="text-align: center;color: black">{{session('status')}}</p>
             </div><br>
        @endif 

<div class="container" style="width: 500px">
	
	<form action="{{ route('adduser')}}" method="POST">
	{{csrf_field()}}
	  @if($errors)
	  <div class="form-group {{$errors->has('name')?'has-error':''}}">
	    <label for="name">User Name:</label>
	    <input type="text" class="form-control" id="name" name="name" placeholder="product name"  autofocus >
	      @if($errors->has('name'))
	             <span style="color: red">*Bạn vui lòng nhập tên đăng ký</span>

	       @endif
	  </div>
	  <div class="form-group {{$errors->has('email')?'has-error':''}}">
	    <label for="email">Email:</label>
	    <input type="email" class="form-control" id="email" name="email" >
	    @if($errors->has('email'))
	             <span style="color: red">*Bạn vui lòng nhập Email đăng ký</span>

	      @endif
	  </div>
	  <div class="form-group {{$errors->has('password')?'has-error':''}}">
	    <label for="password">Password:</label>
	    <input type="password" class="form-control" id="password" name="password" >
	    @if($errors->has('password'))
	             <span style="color: red">*Bạn vui lòng nhập mật khẩu đăng ký</span>

	      @endif
	  </div>
	  <label for="role_id" style="margin-left: 100px">Role:</label>
	    <select name="role_id" id="role_id">
	    	@foreach ($role as $key => $value)
	    		<option value="{{$key}}"> {{ $value }}</option>
	    	@endforeach
	    </select>
	 
	  </div>
	  @endif
	  <button type="submit" class="btn btn-default" style="margin-left: 470px;background: blue;color:white">Lưu <i class='fas fa-vote-yea'></i></button>
	</form>
</div>
@endsection