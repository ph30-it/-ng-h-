<div class="aa-header-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="aa-header-bottom-area">
              <!-- logo  -->
              <div class="aa-logo">
                <!-- Text based logo -->
               
                <a href="{{ route('home') }}"><img src="{{ asset('images/logo.png') }}" alt="logo img"></a>
              </div>
              <!-- / logo  -->
               <!-- cart box -->
              <div class="aa-cartbox">
                <a class="aa-cart-link" href="{{ route('cart-index') }}">
                  <span class="fa fa-shopping-basket"></span>
                  <span class="aa-cart-title">SHOPPING CART</span>
                  <span class="aa-cart-notify">{{ Cart::getTotalQuantity()>0 ? Cart::getTotalQuantity() : 0 }}</span>
                </a>
                <div class="aa-cartbox-summary">
                  <ul>

                    @foreach(Cart::getcontent() as $item)
                    <li>
                      <a class="aa-cartbox-img" href=""><img src="{{ asset($item->attributes->image) }}" alt="img"></a>
                      <div class="aa-cartbox-info">
                        <h4><a href="#">{{ $item['name'] }}</a></h4>
                        <p>{{ $item['quantity'] }} x {{ number_format($item['price']).'₫' }}</p>
                      </div>
                      <a class="aa-remove-product" href="{{ route('delete-product-cart',$item['id']) }} "><span class="fa fa-times"></span></a>
                    </li>
                    @endforeach                 
                    <li>
                      <span class="aa-cartbox-total-title">
                        Total
                      </span>
                      <span class="aa-cartbox-total-price">
                        {{ number_format(Cart::gettotal()).'₫' }}
                      </span>
                    </li>
                  </ul>
                  <a class="aa-cartbox-checkout aa-primary-btn" href="{{ route('checkout') }}">Checkout</a>
                </div>
              </div>
              <!-- / cart box -->
              <!-- search box -->
              <div class="aa-search-box">
                <div class="form-group">
                  <form method="GET" action="{{ route('search-product') }}">
                    @csrf
                    <input type="text" name="search_product" id="search_product" class="form-control search-input input-lg" autocomplete="off" placeholder="Search product " />
                  </form>
                  <div id="searchList"><br>
                  </div>
                </div>
              </div> 
              
              <script>
                $(document).ready(function(){

                 $('#search_product').keyup(function(){
                  var query = $(this).val(); 
                  if(query != '') 
                  {
                   var _token = $('input[name="_token"]').val(); 
                   $.ajax({
                    url:"{{ route('search') }}",
                    method:"GET", 
                    data:{query:query, _token:_token},
                    success:function(data){ 
                      $('#searchList').fadeIn();  
                      $('#searchList').html(data); 
                    }
                    
                  });
                }
               });

                 $(document).on('click', 'li', function(){  
                  $('#search_product').val($(this).text());  
                  $('#searchList').fadeOut();  
                });  

               });
              </script>
              <!-- / search box -->             
            </div>
          </div>
        </div>
      </div>
</div>