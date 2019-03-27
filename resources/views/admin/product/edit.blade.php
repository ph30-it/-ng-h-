@extends('admin.layout.master')
@section('content')
<h1>EDIT PRODUCT</h1>
<div class="container">
	
	<form action="{{ route('update-product', $products->id)}}" method="POST">
	@csrf
	@method('PUT')
	  <div class="form-group">
	    <label for="name">Name :</label>
	    <input type="text" class="form-control" id="name" name="name"  value="{{ $products->name }}">
	  </div>
	   <label for="price">Price:</label>
	    <input type="text" class="form-control" id="price" name="price" value="{{$products->price}}">
	  </div>
	  <div class="form-group">
	    <label for="priceSale">PriceSale:</label>
	    <input type="text" class="form-control" id="priceSale" name="priceSale"value="{{$products->priceSale}}">
	  </div>
	  <div class="form-group">
	    <label for="quantity">Quantity:</label>
	    <input type="text" class="form-control" id="quantity" name="quantity" value="{{$products->quantity}}">
	  </div>
	  <div class="form-group">
	    <label for="description">Description:</label>
	    <input type="text" class="form-control" id="description" name="description"value="{{$products->description}}">
	  </div>
	  <label for="categories_id">Category_ID:</label>
	    <select name="categories_id" id="categories_id">
	    	@foreach ($categoryID as $key => $value)
	    		<option value="{{$key}}" {{ $key == $products->categories_id ? 'selected' : '' }}> {{ $value }}</option>
	    	@endforeach
	    </select><br>
	    <button type="submit" class="btn btn-default "  >Submit</button>
	  </div>
	</form>
</div>
@endsection