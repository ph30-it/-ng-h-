@extends('layouts.master')
@section('title')QV_Watch|Bạn đã tìm {{ $search }}
@stop

@section('content')

	<!-- catg header banner section -->
  <section id="aa-catg-head-banner">
   <img src="{{ asset('images/banner/banner2.png') }}" alt="fashion img">
   <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>SEARCH</h2>
        <ol class="breadcrumb">
          <li><a href="{{ route('home') }}">Home</a></li>         
          <li><a href="{{ route('shop') }}">Product</a></li>
          <li class="active">KẾT QUẢ TÌM KIẾM CHO: <i>{{ $search }}</i></li>
        </ol>
      </div>
     </div>
   </div><br>
  </section>
  <!-- / catg header banner section -->

  <section id="aa-product">
    <div class="container"><br>
        <div class="row">
          <div class="col-md-12">
              <div class="row">
                <div class="aa-product-area">
                    <div class="aa-product-inner">
                      <!-- Tab panes -->
                      <div class="tab-content">
                          <!-- Start men product category -->
                          <div class="tab-pane fade in active">
                            <ul class="aa-product-catg">
                              <!-- start single product item -->
                              @foreach($products as $item)
                              <li>
                                <figure with="250" height="300">
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
                              </li>
                              @endforeach 
                            </ul><br>
                            <div class="aa-product-catg-pagination">
                              <nav style="margin-right: 400px;">
                                {!! $products->links() !!}
                              </nav>
                            </div>
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
  

@stop