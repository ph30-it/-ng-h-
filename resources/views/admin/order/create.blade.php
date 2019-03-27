@extends('admin.layout.master')
@section('content')

<div class="container">
	
	<form action="{{ route('addcomment')}}" method="POST" >
	@csrf
	  <div class="form-group">
	    <label for="title">Title :</label>
	    <input type="text" class="form-control" id="title" name="title">
	  </div>
	  <div class="form-group">
	    <label for="content">Content:</label>
	    <input type="text" class="form-control" id="content" name="content">
	  </div>
	  <div class="form-group">
	    <label for="rate">Rate:</label>
	    <input type="text" class="form-control" id="rate" name="rate">
	  </div>
	  <div class="form-group">
	   <label for="product_id">Product:</label>
	   <select name="product_id" id="product_id">
	    	@foreach ($products as $key => $value)
	    		<option value="{{$key}}"> {{ $value }}</option>
	    	@endforeach
	    </select>
	  </div>
	  <div class="form-group">
	    <label for="user_id">User:</label>
	    <select name="user_id" id="user_id">
	    	@foreach ($user as $key => $value)
	    		<option value="{{$key}}"> {{ $value }}</option>
	    	@endforeach
	    </select>
	  </div>
	  <button type="submit" class="btn btn-default">Submit</button>
	</form>
</div>
@endsection