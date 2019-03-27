@extends('admin.layout.master')
@section('content')
<h1>EDIT PRODUCT</h1>
<div class="container">
	
	<form action="{{ route('update-user', $user->id)}}" method="POST">
	@csrf
	@method('PUT')
	  <div class="form-group">
	    <label for="name">Name :</label>
	    <input type="text" class="form-control" id="name" name="name"  value="{{ $user->name }}">
	  </div>
	   <label for="email">Email:</label>
	    <input type="text" class="form-control" id="email" name="email" value="{{$user->email}}">
	  </div>
	  <div class="form-group">
	    <label for="email_verified_at">Email_verified_at:</label>
	    <input type="text" class="form-control" id="email_verified_at" name="email_verified_at"value="{{$user->email_verified_at}}">
	  </div>
	  <div class="form-group">
	    <label for="password">Passwword:</label>
	    <input type="text" class="form-control" id="passwords" name="password" value="{{$user->password}}">
	  </div>
	  <div class="form-group">
	    <label for="remember_token">Remember_token:</label>
	    <input type="text" class="form-control" id="remember_token" name="remember_token"value="{{$user->remember_token}}">
	  </div>
	  <label for="role_id">Role_id:</label>
	    <select name="role_id" id="role_id">
	    	@foreach ($role as $key => $value)
	    		<option value="{{$key}}" {{ $key == $user->role_id ? 'selected' : '' }}> {{ $value }}</option>
	    	@endforeach
	    </select><br>
	    <button type="submit" class="btn btn-default "  >Submit</button>
	  </div>
	</form>
</div>
@endsection