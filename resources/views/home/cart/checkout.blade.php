@extends('layouts.master')
@section('title')QV_Watch|Checkout
@stop

@section('content')

<!-- catg header banner section -->
<section id="aa-catg-head-banner">
  <img src="{{ asset('images/banner/banner1.jpg') }}" alt="fashion img">
  <div class="aa-catg-head-banner-area">
    <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>Checkout Page</h2>
        <ol class="breadcrumb">
          <li><a href="{{ route('home') }}">Home</a></li>                   
          <li class="active">Checkout</li>
        </ol>
      </div>
    </div>
  </div>
</section>
<!-- / catg header banner section -->

<!-- Cart view section -->
<section id="checkout">
  <div class="container">
   <div class="row">
     <div class="col-md-12">
      <div class="checkout-area">
        <form method="POST" action="{{route('postpayment')}}">
          @csrf
          <div class="row">
            <div class="col-md-8">
              <div class="checkout-left">
                <div class="panel-group" >
                  <!-- Shipping Address -->
                  <div class="panel panel-default aa-checkout-billaddress">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a>
                          Shippping Address
                        </a>
                      </h4>
                    </div>
                    <div >
                      <div class="panel-body">
                       <div class="row">
                        <div class="col-md-12">
                          <div class="aa-checkout-single-bill">
                            <input type="text" placeholder="Recipient's Name*" name="name">
                          </div>                             
                        </div>
                      </div> 
                      <div class="row">
                        <div class="col-md-12">
                          <div class="aa-checkout-single-bill">
                            <input type="text" placeholder="Address*" name="address">
                          </div>                             
                        </div>                            
                      </div>  
                      <div class="row">
                        <div class="col-md-6">
                          <div class="aa-checkout-single-bill">
                            <input type="tel" placeholder="Phone*" name="phone">
                          </div>
                        </div>
                      </div> 
                      <div class="row">
                        <div class="col-md-12">
                          <div class="aa-checkout-single-bill">
                            <textarea cols="8" rows="3" name="note">Note</textarea>
                          </div>                             
                        </div>                            
                      </div>   
                                    
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="checkout-right">
              <h4>Order Summary</h4>
              <div class="aa-order-summary-area">
                <table class="table table-responsive">
                  <thead>
                    <tr>
                      <th>Product</th>
                      <th>Total</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach(Cart::getcontent() as $item)
                    <tr>
                      <td>{{ $item['name'] }} <strong> x  </strong>{{ $item['quantity'] }}</td>
                      <td>{{ number_format($item['price']*$item['quantity']).'₫' }}</td>
                    </tr>
                    @endforeach
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Subtotal</th>
                      <td>{{ number_format(Cart::gettotal()).'₫' }}</td>
                    </tr>
                    <tr>
                      <th>Tax</th>
                      <td>0</td>
                    </tr>
                    <tr>
                      <th>Total</th>
                      <td>{{ number_format(Cart::gettotal()).'₫' }}</td>
                    </tr>
                  </tfoot>
                </table>
              </div>
              <h4>Payment Method</h4>
              <div class="aa-payment-method">                    
                <p>Pay after recieve!</p>    
                <input type="submit" value="Place Order" class="aa-browse-btn">                
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
  </div>
  </div>
</section>
<!-- / Cart view section -->

@stop