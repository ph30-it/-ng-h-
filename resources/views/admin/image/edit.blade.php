@extends('admin.layout.master')
@section('content')
<h1>EDIT PRODUCT</h1>
<div class="container">
	
	<form action="{{ route('update-image', $image->id)}}" method="POST" enctype="multipart/form-data">
	@csrf
	@method('PUT')
	  <div class="form-group">
	    <label for="path">Path :</label>
	    <input type="file" class="form-control" id="path" name="path"  value="{{ $image->path }}">
	  </div>
	   </div>
	  <label for="product_id">Product_id:</label>
	    <select name="product_id" id="product_id">
	    	@foreach ($products as $key => $value)
	    		<option value="{{$key}}" {{ $key == $image->product_id ? 'selected' : '' }}> {{ $value }}</option>
	    	@endforeach
	    </select><br>
	    <button type="submit" class="btn btn-default "  >Submit</button>
	  </div>
	</form>
</div>
@endsection