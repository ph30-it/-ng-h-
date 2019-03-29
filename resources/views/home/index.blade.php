@extends('layouts.master')
@section('title')QV_Watch|Home
@stop


@section('content')
@include('layouts.slide')
	
  <!-- Products section -->
<section id="aa-product">
    <div class="container">
      	<div class="row">
        	<div class="col-md-12">
          		<div class="row">
            		<div class="aa-product-area">
		              	<div class="aa-product-inner">
		                <!-- start prduct navigation -->
			                <ul class="nav nav-tabs aa-products-tab">
			                	@foreach($categories as $item)
			                    <li><a href="?cate={{$item->id}}">{{ $item->name }}</a></li>
			                    @endforeach			                    
			                </ul>
		                  <!-- Tab panes -->
			                <div class="tab-content">
			                    <!-- Start men product category -->
			                    <div class="tab-pane fade in active">
			                    	<ul class="aa-product-catg">
			                    		<!-- start single product item -->
			                    		@foreach($products as $item)
			                    		<li>
			                    			<figure>
			                    				<a class="aa-product-img" href="{{route('product-detail',$item['id'])}}"><img src="{{$item['images'][0]['path']}}" alt="polo shirt img"></a>
			                    				<a class="aa-add-card-btn"href="{{ route('add-cart', $item['id']) }}"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
			                    				<figcaption>
			                    					<h4 class="aa-product-title"><a href="{{route('product-detail',$item['id'])}}">{{ $item['name'] }}</a></h4>
			                    					<span class="aa-product-price">{{ number_format($item['price']-($item['price']*$item['priceSale']/100)).'₫' }}</span><span class="aa-product-price"><del>{{ number_format($item['price']).'₫' }}</del></span>
			                    				</figcaption>
			                    			</figure>                        
			                    			<div class="aa-product-hvr-content">
			                    				<a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
			                    				
			                    				<a href="" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>                          
			                    			</div>
			                    			<!-- product badge -->
			                    			@if($item['priceSale'] != 0)
												<span class="aa-badge aa-sold-out" style="margin-top: 30px;" href="#">SALE!</span>
											@endif
											@foreach($newproduct as $new)	
											@if($new['id']==$item['id'])
												<span class="aa-badge aa-sale" style="margin-top: -10px;" href="#">NEW!</span>
											@endif
											@endforeach
											
												<!-- <span class="aa-badge aa-hot" href="#">HOT!</span> -->
											
			                    		</li>
			                    		@endforeach 
			                    	</ul>
			                    	<a class="aa-browse-btn" href="#">Browse all Product <span class="fa fa-long-arrow-right"></span></a>
			                    </div><br>
			                    <!-- / men product category -->
							</div>
		                  <!-- quick view modal --> 
		                  	                
		                  	<div class="modal fade" id="quick-view-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
		                  		<div class="modal-dialog">
		                  			<div class="modal-content">                      
		                  				<div class="modal-body">
		                  					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		                  					<div class="row">
		                  						<!-- Modal view slider -->
		                  						<div class="col-md-6 col-sm-6 col-xs-12">                              
		                  							<div class="aa-product-view-slider">                                
		                  								<div class="simpleLens-gallery-container" id="demo-1">
		                  									<div class="simpleLens-container">
		                  										<div class="simpleLens-big-image-container">
		                  											<a class="simpleLens-lens-image" data-lens-image="img/view-slider/large/polo-shirt-1.png">
		                  												<img src="img/view-slider/medium/polo-shirt-1.png" class="simpleLens-big-image">
		                  											</a>
		                  										</div>
		                  									</div>
		                  									<div class="simpleLens-thumbnails-container">
		                  										<a href="#" class="simpleLens-thumbnail-wrapper" data-lens-image="img/view-slider/large/polo-shirt-1.png" data-big-image="img/view-slider/medium/polo-shirt-1.png">
		                  											<img src="img/view-slider/thumbnail/polo-shirt-1.png">
		                  										</a>                                    
		                  										<a href="#" class="simpleLens-thumbnail-wrapper" data-lens-image="img/view-slider/large/polo-shirt-3.png" data-big-image="img/view-slider/medium/polo-shirt-3.png">
		                  											<img src="img/view-slider/thumbnail/polo-shirt-3.png">
		                  										</a>

		                  										<a href="#" class="simpleLens-thumbnail-wrapper" data-lens-image="img/view-slider/large/polo-shirt-4.png" data-big-image="img/view-slider/medium/polo-shirt-4.png">
		                  											<img src="img/view-slider/thumbnail/polo-shirt-4.png">
		                  										</a>
		                  									</div>
		                  								</div>
		                  							</div>
		                  						</div>
		                  						<!-- Modal view content -->
		                  						<div class="col-md-6 col-sm-6 col-xs-12">
		                  							<div class="aa-product-view-content">
		                  								<h3>T-Shirt</h3>
		                  								<div class="aa-price-block">
		                  									<span class="aa-product-view-price">$</span>
		                  									<p class="aa-product-avilability">Avilability: <span>In stock</span></p>
		                  								</div>
		                  								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis animi, veritatis quae repudiandae quod nulla porro quidem, itaque quis quaerat!</p>
		                  								<div class="aa-prod-quantity">
		                  									<form action="">
		                  										<select name="" id="">
		                  											<option value="0" selected="1">1</option>
		                  											<option value="1">2</option>
		                  											<option value="2">3</option>
		                  											<option value="3">4</option>
		                  											<option value="4">5</option>
		                  											<option value="5">6</option>
		                  										</select>
		                  									</form>
		                  									<p class="aa-prod-category">
		                  										Category: <a href="#">Polo T-Shirt</a>
		                  									</p>
		                  								</div>
		                  								<div class="aa-prod-view-bottom">
		                  									<a href="#" class="aa-add-to-cart-btn"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
		                  									<a href="#" class="aa-add-to-cart-btn">View Details</a>
		                  								</div>
		                  							</div>
		                  						</div>
		                  					</div>
		                  				</div>                        
		                  			</div><!-- /.modal-content -->
		                  		</div><!-- /.modal-dialog -->
		                  	</div>
		                  	
		                </div>
		            </div>                        
		        </div>
          	</div>
      	</div>                           
    </div>
</section>
  <!-- / Products section -->
  <!-- banner section -->
<section id="aa-banner">
  	<div class="container">
  		<div class="row">
  			<div class="col-md-12">        
  				<div class="row">
  					<div class="aa-banner-area">
  						<a href="#"><img src="{{ asset('images/banner/banner6.png') }}" alt="fashion banner img"></a>
  					</div>
  				</div>
  			</div>
  		</div>
  	</div>
</section>
  <!-- popular section -->
<section id="aa-popular-category">
    <div class="container">
      	<div class="row">
	        <div class="col-md-12">
	          	<div class="row">
		            <div class="aa-popular-category-area">
		              <!-- start prduct navigation -->
		            <ul class="nav nav-tabs aa-products-tab">
		                <li class="active"><a href="#new" data-toggle="tab">NEW</a></li>
		                <li><a href="#hot" data-toggle="tab">HOT</a></li>
		                <li><a href="#sale" data-toggle="tab">SALE</a></li>                    
		            </ul>
		              <!-- Tab panes -->
	              	<div class="tab-content">
		                <div class="tab-pane fade in active" id="new">
		                  	<ul class="aa-product-catg aa-popular-slider">
		                  		@foreach($newproduct as $item)
	                    		<li>
	                    			<figure>
	                    				<a class="aa-product-img" href="{{route('product-detail',$item['id'])}}"><img src="{{$item['images'][0]['path']}}" alt="polo shirt img"></a>
	                    				<a class="aa-add-card-btn"href="{{ route('add-cart', $item['id']) }}"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
	                    				<figcaption>
	                    					<h4 class="aa-product-title"><a href="{{route('product-detail',$item['id'])}}">{{ $item['name'] }}</a></h4>
	                    					<span class="aa-product-price">{{ number_format($item['price']-($item['price']*$item['priceSale']/100)).'₫' }}</span><span class="aa-product-price"><del>{{ number_format($item['price']).'₫' }}</del></span>
	                    				</figcaption>
	                    			</figure>                        
	                    			<div class="aa-product-hvr-content">
	                    				<a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
	                    				
	                    				<a href="" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>                          
	                    			</div>
	                    			<!-- product badge -->
										<span class="aa-badge aa-sale" href="#">NEW!</span>
	                    		</li>
	                    		@endforeach
		                  	</ul>
		                  	<a class="aa-browse-btn" href="{{ route('shop') }}">Browse all Product <span class="fa fa-long-arrow-right"></span></a>
		                </div>
		                <!-- / popular product category -->
		                	
		                <!-- start featured product category -->
		                <div class="tab-pane fade" id="hot">
		                 	<ul class="aa-product-catg aa-featured-slider">
		                    <!-- start single product item -->
			                    
			                      
		                  	</ul>
		                  	<a class="aa-browse-btn" href="{{ route('shop') }}">Browse all Product <span class="fa fa-long-arrow-right"></span></a>
		                </div>
		                <!-- / featured product category -->

		                <!-- start latest product category -->
		                <div class="tab-pane fade" id="sale">
		                  	<ul class="aa-product-catg aa-latest-slider">
		                    <!-- start single product item -->
			                    @foreach($saleproduct as $item)
	                    		<li>
	                    			<figure>
	                    				<a class="aa-product-img" href="{{route('product-detail',$item['id'])}}"><img src="{{$item['images'][0]['path']}}" alt="polo shirt img"></a>
	                    				<a class="aa-add-card-btn"href="{{ route('add-cart', $item['id']) }}"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
	                    				<figcaption>
	                    					<h4 class="aa-product-title"><a href="{{route('product-detail',$item['id'])}}">{{ $item['name'] }}</a></h4>
	                    					<span class="aa-product-price">{{ number_format($item['price']-($item['price']*$item['priceSale']/100)).'₫' }}</span><span class="aa-product-price"><del>{{ number_format($item['price']).'₫' }}</del></span>
	                    				</figcaption>
	                    			</figure>                        
	                    			<div class="aa-product-hvr-content">
	                    				<a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
	                    				
	                    				<a href="" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>                          
	                    			</div>
	                    			<!-- product badge -->
										<span class="aa-badge aa-sold-out" href="#">SALE!</span>
	                    		</li>
	                    		@endforeach
			                    
		                  	</ul>
		                   	<a class="aa-browse-btn" href="{{ route('shop') }}">Browse all Product <span class="fa fa-long-arrow-right"></span></a>
		                </div>            
	              	</div>
	          	</div> 
	        </div>
      	</div>
    </div>
</section>
  <!-- / popular section -->
  <!-- Client Brand -->
<section id="aa-client-brand">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-client-brand-area">
            <ul class="aa-client-brand-slider">
              <li><a href="#"><img src="{{asset('images/dong-ho-calvin-klein.png')}}" alt="java img"></a></li>
              <li><a href="#"><img src="{{asset('images/dong-ho-casio.png')}}" alt="java img"></a></li>
              <li><a href="#"><img src="{{asset('images/dong-ho-citizen.png')}}" alt="java img"></a></li>
              <li><a href="#"><img src="{{asset('images/dong-ho-daniel-wellington.png')}}" alt="java img"></a></li>
              <li><a href="#"><img src="{{asset('images/dong-ho-ediffice.png')}}" alt="java img"></a></li>
              <li><a href="#"><img src="{{asset('images/dong-ho-fossil.png')}}" alt="java img"></a></li>
              <li><a href="#"><img src="{{asset('images/dong-ho-g-stock.png')}}" alt="java img"></a></li>
              <li><a href="#"><img src="{{asset('images/dong-ho-olym-pianus.png')}}" alt="java img"></a></li>
              <li><a href="#"><img src="{{asset('images/dong-ho-olympia-star.png')}}" alt="java img"></a></li>
              <li><a href="#"><img src="{{asset('images/dong-ho-orient.png')}}" alt="java img"></a></li>
              <li><a href="#"><img src="{{asset('images/dong-ho-tisot.png')}}" alt="java img"></a></li>
              
            </ul>
          </div>
        </div>
      </div>
    </div>
</section>
  <!-- / Client Brand -->

@stop