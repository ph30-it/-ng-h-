@extends('layouts.master')
@section('title')QV_Watch|Product-Detail
@stop

@section('content')

	<!-- catg header banner section -->
  <section id="aa-catg-head-banner">
   <img src="{{ asset('images/banner/banner2.png') }}" alt="fashion img">
   <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>{{ $product['name'] }}</h2>
        <ol class="breadcrumb">
          <li><a href="{{ route('home') }}">Home</a></li>         
          <li><a href="{{ route('shop') }}">Product</a></li>
          <li class="active">{{ $product['name'] }}</li>
        </ol>
      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->
  <section id="aa-product-details">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-product-details-area">
            <div class="aa-product-details-content">
              <div class="row">
                <!-- Modal view slider -->
                <div class="col-md-5 col-sm-5 col-xs-12">                              
                  <div class="aa-product-view-slider">                                
                    <div id="demo-1" class="simpleLens-gallery-container">
                      <div class="simpleLens-container">
                        <div class="simpleLens-big-image-container"><a data-lens-image="{{ asset($product['images'][0]['path']) }}" class="simpleLens-lens-image"><img src="{{ asset($product['images'][0]['path']) }}" width="250" height="300" class="simpleLens-big-image"></a></div>
                      </div>
                      <div class="simpleLens-thumbnails-container">
                          @if(isset($product['images'][1]['path']))
                            <a data-big-image="{{ asset($product['images'][1]['path']) }}" data-lens-image="{{ asset($product['images'][1]['path']) }}" class="simpleLens-thumbnail-wrapper" href="#">
                              <img src="{{ asset($product['images'][1]['path']) }}" width="45" height="55">
                            </a>
                          @endif
                          @if(isset($product['images'][2]['path']))                                    
                            <a data-big-image="{{ asset($product['images'][2]['path']) }}" data-lens-image="{{ asset($product['images'][2]['path']) }}" class="simpleLens-thumbnail-wrapper" href="#">
                              <img src="{{ asset($product['images'][2]['path']) }}" width="45" height="55">
                            </a>
                          @endif
                          @if(isset($product['images'][3]['path']))
                            <a data-big-image="{{ asset($product['images'][3]['path']) }}" data-lens-image="{{ asset($product['images'][3]['path']) }}" class="simpleLens-thumbnail-wrapper" href="#">
                              <img src="{{ asset($product['images'][3]['path']) }}" width="45" height="55">
                            </a>
                          @endif
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Modal view content -->
                <div class="col-md-7 col-sm-7 col-xs-12">
                  <div class="aa-product-view-content">
                    <h3>{{ $product['name'] }}</h3>
                    <div class="aa-price-block">
                      <span class="aa-product-view-price">${{ $product['price'] }}</span>
                      <p class="aa-product-avilability">Avilability: <span>{{ $product['quantity'] }}</span></p>
                    </div>
                    <p>{{ $product['description'] }}!</p>

                    <p class="aa-prod-category">
                      Category: <a href="#">{{ $category['0']['name'] }}</a>
                    </p>
                    </div>
                    <div class="aa-prod-view-bottom">
                      <a class="aa-add-to-cart-btn" href="{{ route('add-cart', $product['id']) }}">Add To Cart</a>
                      <a class="aa-add-to-cart-btn" href="#">Wishlist</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="aa-product-details-bottom">
              <ul class="nav nav-tabs" id="myTab2">
                <li><a href="#description" data-toggle="tab">Description</a></li>
                <li><a href="#review" data-toggle="tab">Reviews</a></li>                
              </ul>

              <!-- Tab panes -->
              <div class="tab-content">
                <div class="tab-pane fade in active" id="description">
                  <p>{{ $product['long_description'] }}.</p>
                </div>
                <div class="tab-pane fade " id="review">
                 <div class="aa-product-review-area">
                   <h4>{{ $comments->count('product_id') }} Reviews for <b>( {{ $product['name'] }} )</b></h4> 
                   <ul class="aa-review-nav">
                    @foreach($comments as $comment)
                     <li>
                        <div class="media">
                          <div class="media-left">
                            <a href="#">
                              <img class="media-object" src="img/testimonial-img-3.jpg" alt="girl image">
                            </a>
                          </div>
                          <div class="media-body">
                            <h4 class="media-heading"><strong>{{ $comment->name }} - {{ $comment->email }}</strong> - <span>({{ $comment->created_at }})</span></h4>
                            <input id="input-1" name="input-1" class="rating rating-loading" data-min="0" data-max="5" data-show-caption="false" data-step="0.1" value="{{ $comment->rate }}" data-size="s" disabled="">
                            <p>{{ $comment->content }}</p>
                          </div>
                        </div>
                      </li>
                      @endforeach
                   </ul>
                   <h4>Add a review</h4>
                   <!-- review form -->
                   <form method="POST" action="{{route('comment')}}" class="aa-review-form">
                    @csrf

                      <div class="rating">
                        <input id="input-1" name="rate" class="rating rating-loading" data-min="0" data-max="5" data-step="1" value="" data-size="xs">
                      </div>
                      <input type="hidden" name="product_id" value="{{$product['id']}}">
                      <div class="form-group">
                        <label for="message">Your Review</label>
                        <textarea class="form-control" rows="3" id="message" name="content"></textarea>
                      </div>
                      @if( Auth::check())
                      <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Name" name="name" value="{{ Auth::user()->name }}">
                      </div>  
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="example@gmail.com" name="email" value="{{ Auth::user()->email }}">
                      </div>
                      @else
                      <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Name" name="name" >
                      </div>  
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="example@gmail.com" name="email" >
                      </div>
                      @endif

                      <button type="submit" class="btn btn-default aa-review-submit">Submit</button>
                    
                   </form>
                 </div>
                </div>            
              </div>
            </div>
            <!-- Related product -->
            <div class="aa-product-related-item">
              <h3>Related Products</h3>
              <ul class="aa-product-catg aa-related-item-slider">
                <!-- start single product item -->
                @foreach($relatedproduct as $item)
                <li>
                  <figure>
                    <a class="aa-product-img" href="{{route('product-detail',$item['id'])}}"><img src="{{asset($item['images'][0]['path'])}}" alt="polo shirt img"></a>
                    <a class="aa-add-card-btn"href="{{ route('add-cart', $item['id']) }}"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                     <figcaption>
                      <h4 class="aa-product-title"><a href="#">{{ $item['name'] }}</a></h4>
                      <span class="aa-product-price">{{ number_format($item['price']-($item['price']*$item['priceSale']/100)).'₫' }}</span><span class="aa-product-price"><del>{{ number_format($item['price']).'₫' }}</del></span>
                    </figcaption>
                  </figure>                     
                  <div class="aa-product-hvr-content">
                    <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                    <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>                            
                  </div>
                  <!-- product badge -->
                  <span class="aa-badge aa-sale" href="#">SALE!</span>
                </li>
                @endforeach
                 <!-- start single product item -->
                                                                                                   
              </ul>
              <!-- quick view modal -->                  
              <div class="modal fade" id="quick-view-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">                      
                    <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
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
                                  <a href="#" class="simpleLens-thumbnail-wrapper"
                                     data-lens-image="img/view-slider/large/polo-shirt-1.png"
                                     data-big-image="img/view-slider/medium/polo-shirt-1.png">
                                      <img src="img/view-slider/thumbnail/polo-shirt-1.png">
                                  </a>                                    
                                  <a href="#" class="simpleLens-thumbnail-wrapper"
                                     data-lens-image="img/view-slider/large/polo-shirt-3.png"
                                     data-big-image="img/view-slider/medium/polo-shirt-3.png">
                                      <img src="img/view-slider/thumbnail/polo-shirt-3.png">
                                  </a>

                                  <a href="#" class="simpleLens-thumbnail-wrapper"
                                     data-lens-image="img/view-slider/large/polo-shirt-4.png"
                                     data-big-image="img/view-slider/medium/polo-shirt-4.png">
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
                              <span class="aa-product-view-price">$34.99</span>
                              <p class="aa-product-avilability">Avilability: <span>In stock</span></p>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis animi, veritatis quae repudiandae quod nulla porro quidem, itaque quis quaerat!</p>
                            <h4>Size</h4>
                            <div class="aa-prod-view-size">
                              <a href="#">S</a>
                              <a href="#">M</a>
                              <a href="#">L</a>
                              <a href="#">XL</a>
                            </div>
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
              <!-- / quick view modal -->   
            </div>  
          </div>
        </div>
      </div>
    </div>
    
  </section>

@stop