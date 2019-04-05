@extends('admin.layout.master')
@section('content')
     <div style="background:  #66CC33;height: 40px">
     <h3 style="text-align: center;color:white"><i>Thêm sản phẩm</i></h3> <br> 
  </div> 
       @if(session('status'))
            <div style="background: #66CC33;height: 50px;margin-bottom: -25px ">
                  <p style="text-align: center;color: red">{{session('status')}}</p>
             </div><br>
        @endif 

           <div class="container" style="width: 400px">
	
	<form action="{{ route('addproduct')}}" method="POST" enctype="multipart/form-data">
        
	   {{csrf_field()}}
	   @if($errors)
	  <div class="form-group {{$errors->has('name')?'has-error':''}}" >
	     <label for="name">Tên sản phẩm<span style="color: red">*</span>:</label>
	          <input type="text" class="form-control" id="name[]" name="name" placeholder="Tên sản phẩm" value="{{old('name')}}" >
	          @if($errors->has('name'))
	             <span style="color: red">*Bạn vui lòng nhập tên sản phẩm</span>

	          @endif
	   </div>
	   <div class="row">
	   	  <div class="cl-md-6">
	        <div class="form-group {{$errors->has('price')?'has-error':''}}">
	          <label for="price" style="margin-left: 80px">Giá<span style="color: red">*</span>:</label>
	               <input type="text" class="form-control" id="price" name="price" style="width: 180px;margin-left: 10px" value="{{old('price')}}" >
	                @if($errors->has('price'))
	                  <span style="color: red;margin-left: 20px">*Giá sản phẩm trống</span>

	               @endif
	             </div>
	          </div>
	       <div class="col-md-6">
	        <div class="form-group">
	          <label for="priceSale" style="margin-left: 40px">Khuyến mãi:</label>
	               <input type="text" class="form-control" id="priceSale" name="priceSale" style="width: 180px" value="{{ old ('priceSale') }}" >
	        </div>
	      </div>
	  </div>
	  <div class="form-group {{$errors->has('quantity')?'has-error':''}}">
	           <label for="quantity">Số lượng<span style="color: red">*</span>:</label>
	                 <input type="number" class="form-control" id="quantity" name="quantity" style="width: 90px" >
	                 @if($errors->has('quantity'))
	                  <span style="color: red">*Số lượng sản phẩm trống</span>

	               @endif

	  </div>
	  <div class="form-group {{$errors->has('description')?'has-error':''}}">
	             <label for="description">Tiêu đề:</label><br>
	                    <input type="text" name="description" class="form-control" >
	                 @if($errors->has('description'))
	                  <span >Bạn vui long nhập đánh giá </span>

	                 @endif
	  </div>
	  <div class="form-group {{$errors->has('description')?'has-error':''}}">
	             <label for="description">Mô tả<span style="color: red">*</span>:</label><br>
	                    <textarea name="long_description" rows="6" cols="44" style="height: 70px" value="{{old('long_description')}}" ></textarea>
	                 @if($errors->has('description'))
	                  <span >Bạn vui long nhập đánh giá </span>

	                 @endif
	  </div>
	   <div class="form-group {{$errors->has('path')?'has-error':''}}">
	           <label for="path">Ảnh sản phẩm<span style="color: red">*</span>:</label>
	                  <input type="file" class="form-control" id="path" name="path">
	                   @if($errors->has('path'))
	                  <span style="color: red"> *Bạn vui lòng chọn ảnh sản phẩm</span>

	                 @endif
	  </div>

	            <label for="category_id">Hãng:</label>
	          <select name="category_id" id="category_id">
	    	        @foreach ($categoryID as $key => $value)
	    		         <option value="{{$key}}"> {{ $value }}</option>
	    	        @endforeach
	         </select>
	 
	  </div>
	  @endif
	  <button type="submit" class="btn btn-default" style="background: blue;color: white;margin-left: 480px"><b>Lưu <i class='fas fa-vote-yea'></i></button>
	</form>
</div>
@endsection