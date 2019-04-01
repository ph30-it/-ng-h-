@extends('admin.layout.master')
@section('content')
<h1>EDIT PRODUCT</h1>
<div class="container">
	
	<form action="{{ route('update-comment', $comment->id)}}" method="POST">
	@csrf
	@method('PUT')
	  <div class="form-group">
	    <label for="title">Title :</label>
	    <input type="text" class="form-control" id="title" name="title"  value="{{ $comment->title }}">
	  </div>
	   <label for="comtent">Content:</label>
	    <input type="text" class="form-control" id="content" name="content" value="{{$comment->content}}">
	  </div>
	  <div class="form-group">
	    <label for="rate">Rate:</label>
	    <input type="text" class="form-control" id="rate" name="rate"value="{{$comment->rate}}">
	  </div>
	  <div class="form-group">
	    <label for="product_id">Product:</label>
	    <select name="product_id" id="product_id">
	    	@foreach ($products as $key => $value)
	    		<option value="{{$key}}" {{ $key == $comment->product_id ? 'selected' : '' }}> {{ $value }}</option>
	    	@endforeach
	    </select>
	  </div>
	  <div class="form-group">
	    <label for="user_id">User:</label>
	   <select name="user_id" id="user_id">
	    	@foreach ($user as $key => $value)
	    		<option value="{{$key}}" {{ $key == $comment->user_id ? 'selected' : '' }}> {{ $value }}</option>
	    	@endforeach
	    </select>
	  </div>
	    <button type="submit" class="btn btn-default "  >Submit</button>
	  </div>
	</form>
</div>
@endsection