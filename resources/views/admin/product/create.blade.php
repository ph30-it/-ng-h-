@extends('admin.layout.master')
@section('content')

<div class="container">
	
	<form action="{{ route('addproduct')}}" method="POST">
	@csrf
	  <div class="form-group">
	    <label for="name">Name :</label>
	    <input type="text" class="form-control" id="name" name="name">
	  </div>
	  <div class="form-group">
	    <label for="price">Price:</label>
	    <input type="text" class="form-control" id="price" name="price">
	  </div>
	  <div class="form-group">
	    <label for="priceSale">PriceSale:</label>
	    <input type="text" class="form-control" id="priceSale" name="priceSale">
	  </div>
	  <div class="form-group">
	    <label for="quantity">Quantity:</label>
	    <input type="text" class="form-control" id="quantity" name="quantity">
	  </div>
	  <div class="form-group">
	    <label for="description">Description:</label>
	    <input type="text" class="form-control" id="description" name="description">
	  </div>
	  <label for="category_id">Category:</label>
	    <select name="category_id" id="category_id">
	    	@foreach ($categoryID as $key => $value)
	    		<option value="{{$key}}"> {{ $value }}</option>
	    	@endforeach
	    </select>
	 
	  </div>
	  <button type="submit" class="btn btn-default">Submit</button>
	</form>
</div>
@endsection