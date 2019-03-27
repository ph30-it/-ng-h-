@extends('admin.layout.master')
@section('content')

<div class="container">
	
	<form action="{{ route('adduser')}}" method="POST">
	@csrf
	  <div class="form-group">
	    <label for="name">Name :</label>
	    <input type="text" class="form-control" id="name" name="name">
	  </div>
	  <div class="form-group">
	    <label for="email">Email:</label>
	    <input type="text" class="form-control" id="email" name="email">
	  </div>
	  <div class="form-group">
	    <label for="email_verified_at">Email_verified_at:</label>
	    <input type="text" class="form-control" id="email_verified_at" name="email_verified_at">
	  </div>
	  <div class="form-group">
	    <label for="password">Password:</label>
	    <input type="text" class="form-control" id="password" name="password">
	  </div>
	  <div class="form-group">
	    <label for="remember_token">Remember_token:</label>
	    <input type="text" class="form-control" id="remember_token" name="remember_token">
	  </div>
	  <label for="role_id">Role_id:</label>
	    <select name="role_id" id="role_id">
	    	@foreach ($role as $key => $value)
	    		<option value="{{$key}}"> {{ $value }}</option>
	    	@endforeach
	    </select>
	 
	  </div>
	  <button type="submit" class="btn btn-default">Submit</button>
	</form>
</div>
@endsection