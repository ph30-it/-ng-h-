@extends('admin.layout.master')
@section('content')
  <h2 style="text-align: center;"> <b>Add Product</b> </h2>
       @if(session('status'))
            <div style="background: #00CC66;height: 50px;margin-bottom: -25px ">
                  <p style="text-align: center;color: black">{{session('status')}}</p>
             </div><br>
        @endif 

<div class="container" style="width: 500px">
	
	<form action="{{ route('adduser')}}" method="POST">
	@csrf
	  <div class="form-group">
	    <label for="name">Name :</label>
	    <input type="text" class="form-control" id="name" name="name" placeholder="product name"  autofocus required>
	  </div>
	  <div class="form-group">
	    <label for="email">Email:</label>
	    <input type="email" class="form-control" id="email" name="email" required>
	  </div>
	  <div class="form-group">
	    <label for="password">Password:</label>
	    <input type="password" class="form-control" id="password" name="password" required>
	  </div>
	  <div class="form-group">
	    <label for="remember_token">Remember_token:</label>
	    <input type="password" class="form-control" id="remember_token" name="remember_token" required>
	  </div>
	  <label for="role_id" style="margin-left: 100px">Role_id:</label>
	    <select name="role_id" id="role_id">
	    	@foreach ($role as $key => $value)
	    		<option value="{{$key}}"> {{ $value }}</option>
	    	@endforeach
	    </select>
	 
	  </div>
	  <button type="submit" class="btn btn-default" style="margin-left: 470px;background: blue;color:white">Submit</button>
	</form>
</div>
@endsection