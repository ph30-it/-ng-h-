@extends('admin.layout.master')
@section('content')
<h1>EDIT PRODUCT</h1>
<div class="container">
	
	<form action="{{ route('update-order', $order->id)}}" method="POST">
	@csrf
	@method('PUT')
	<?php 
      $order_detail=App\Order_detail::pluck('id','quantity','price','product_id','order_id');

	?>
	<div class="form-group">
	    <label for="id">ID_order :</label>
	    <input type="text" class="form-control" id="id" name="id"  value="{{ $order->id }}">
	  </div>
	  <div class="form-group">
	    <label for="quantity">Quantity :</label>
	    <input type="text" class="form-control" id="quantity" name="quantity"  value="{{ $order_detail->quantity }}">
	  </div>
	   <label for="price">Price:</label>
	    <input type="text" class="form-control" id="price" name="price" value="{{$order_detail->price}}">
	  </div>
	  <div class="form-group">
	    <label for="product_id">Product_id:</label>
	    <input type="text" class="form-control" id="product_id" name="product"value="{{$order_detail->product_id}}">
	  </div>
	  <div class="form-group">
	    <label for="order_id">Order_id:</label>
	    <input type="text" class="form-control" id="order_id" name="order_id" value="{{$order_detail->order_id}}">
	  </div>
	 <div class="form-group">
	    <label for="status">Status:</label>
	    <input type="text" class="form-control" id="status" name="status" value="{{$order->status}}">
	  </div>
	    <button type="submit" class="btn btn-default "  >Submit</button>
	  </div>
	</form>
</div>
@endsection