<div class="aa-header-top">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="aa-header-top-area">
              <!-- start header top left -->
              <div class="aa-header-top-left">
                
                <!-- start cellphone -->
                <div class="cellphone hidden-xs">
                  <p><span class="fa fa-phone"></span>033-6017-808</p>
                </div>
                <!-- / cellphone -->
              </div>
              <!-- / header top left -->
              <div class="aa-header-top-right">
                
                <ul class="aa-head-top-nav-right">
                  <li>
                    <div class="aa-language">
                      <div class="dropdown">
                        @if(Auth::check())
                        <a class="btn dropdown-toggle" href="{{ route('account') }}" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="font-size: 120%; color: red;">
                          {{Auth::user()->name}}
                          <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                          <li><a href="#" style="font-size: 100%; color: green;">My Profile</a></li>
                          <li><a href="{{ route('logout') }}" style="font-size: 100%; color: green;" 
                            onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                              Logout</a>
                              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                  @csrf
                              </form>
                          </li>
                        </ul>
                        @else
                        <a href="{{ route('account') }}">My Account</a>
                        
                        @endif
                      </div>
                    </div>
                  </li>
                  <li class="hidden-xs"><a href="{{ route('wishlist') }}">Wishlist</a></li>
                  <li class="hidden-xs"><a href="{{ route('cart-index') }}">My Cart</a></li>
                  <li class="hidden-xs"><a href="{{ route('checkout') }}">Checkout</a></li>
                  @if(Auth::check())
                  @else
                  <li><a href="" data-toggle="modal" data-target="#login-modal">Login</a></li>
                  @endif
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>