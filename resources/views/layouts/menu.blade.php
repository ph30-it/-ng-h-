<section id="menu">
    <div class="container">
      <div class="menu-area">
        <!-- Navbar -->
        <div class="navbar navbar-default" role="navigation">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>          
          </div>
          <div class="navbar-collapse collapse">
            <!-- Left nav -->
            <ul class="nav navbar-nav">
              <li><a href="{{ route('home') }}">Home</a></li>
              <li><a href="{{ route('shop') }}">Shop</a></li>
              <li><a href="{{ route('contact') }}">Contact</a></li>
              <li><a href="">Pages <span class="caret"></span></a>
                <ul class="dropdown-menu">                
                  <li><a href="{{ route('shop') }}">Shop Page</a></li>
                  <li><a href="product-detail.html">Blog Single</a></li>                
                </ul>
              </li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>       
    </div>
  </section>