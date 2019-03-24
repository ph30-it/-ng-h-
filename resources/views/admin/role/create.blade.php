@extends('admin.layout.master')
@section('content')
<h3 style="text-align: center;">Create Image</h3> <br> 
<div class="container" style="margin-left: 400px">
	
	<form action="{{ route('addimage')}}" method="POST" enctype="multipart/form-data"><!-- ho tro up loat file  muti-->
	@csrf
	  <div class="form-group">
	    <label for="path" >Image:</label>
	    <input type="file" class="form-control" id="path" name="path" style="width: 300px"><br>
	  </div>
	  
	  <label for="product_id">Product_id:</label><br>
	    <select name="product_id" id="product_id">
	    	@foreach ($products as $key => $value)
	    		<option value="{{$key}}"> {{ $value }}</option>
	    	@endforeach
	    </select>
	 
	  </div>
	  <button type="submit" class="btn btn-default" style="margin-left: 470px" >Submit</button>
	</form>
</div>

@endsection