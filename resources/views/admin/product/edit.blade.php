@extends('admin.layout.master')
@section('content')
      <h2 style="text-align: center;"> <b>Edit Product</b> </h2>
       @if(session('status'))
            <div style="background: #00CC66;height: 50px;margin-bottom: -25px ">
                  <p style="text-align: center;color: black">{{session('status')}}</p>
             </div><br>
        @endif 

           <div class="container" style="width: 400px">
	
	<form action="{{ route('update-product',$products->id)}}" method="POST" ype="multipart/form-data">
	   @csrf
	   @method('PUT')
	  <div class="form-group">
	     <label for="name">Name :</label>
	          <input type="text" class="form-control" id="name" name="name" placeholder="product name"  autofocus  value="{{$products->name}}">
	   </div>
	   <div class="row">
	   	  <div class="cl-md-6">
	        <div class="form-group">
	          <label for="price" style="margin-left: 80px">Price:</label>
	               <input type="text" class="form-control" id="price" name="price" style="width: 180px;margin-left: 10px" value="{{ $products->price}}" >
	             </div>
	          </div>
	       <div class="col-md-6">
	        <div class="form-group">
	          <label for="priceSale" style="margin-left: 40px">PriceSale:</label>
	               <input type="text" class="form-control" id="priceSale" name="priceSale" style="width: 180px" value="{{$products->priceSale}}" >
	        </div>
	      </div>
	  </div>
	  <div class="form-group">
	           <label for="quantity">Quantity:</label>
	                 <input type="number" class="form-control" id="quantity" name="quantity" style="width: 90px" value="{{$products->quantity}}" >
	  </div>
	  <div class="form-group">
	             <label for="description">Description:</label><br>
	                   <input type="text" class="form-control" name="description" value="{{$products->description}}" style="width: 370px">
	  </div>
	  <div class="form-group">
	             <label for="description">Long_Description:</label><br>
	                    <textarea name="long_description" rows="6" cols="44" style="height: 70px" value="{{$products->long_description}}" >{{$products->long_description}}</textarea>
	  </div>

	            <label for="category_id">Category:</label>
	          <select name="category_id" id="category_id">
	    	       @foreach ($categoryID as $key => $value)
	    		<option value="{{$key}}" {{ $key == $products->categories_id ? 'selected' : '' }}> {{ $value }}</option>
	    	@endforeach
	         </select>
	 
	  </div>
	  <button type="submit" class="btn btn-default" style="background: blue;color: white;text-align: center;margin-left: 500px"><b>Lưu <i class='fas fa-vote-yea'></i></button>
	</form>
</div>
@endsection