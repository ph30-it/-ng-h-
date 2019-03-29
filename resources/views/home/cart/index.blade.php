@extends('layouts.master')
@section('title')QV_Watch|Cart
@stop

@section('content')

<!-- catg header banner section -->
  <section id="aa-catg-head-banner">
   <img src="{{ asset('images/banner/banner1.jpg') }}" alt="fashion img">
   <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>Cart Page</h2>
        <ol class="breadcrumb">
          <li><a href="{{ route('home') }}">Home</a></li>                   
          <li class="active">Cart</li>
        </ol>
      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->

 <!-- Cart view section -->
 <section id="cart-view">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="cart-view-area">
           <div class="cart-view-table">
             <form action="">
               <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th></th>
                        <th></th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($content as $item)
                      <tr>
                        <td><a class="remove" href="{{ route('delete-product-cart',$item['id']) }}"><fa class="fa fa-close"></fa></a></td>
                        <td><a href="#"><img src="{{ asset($item->attributes->image) }}" alt="img"></a></td>
                        <td><a class="aa-cart-title" href="#">{{ $item['name'] }}</a></td>
                        <td>{{ number_format($item['price']).'₫' }}</td>
                        <td>
                          <div class="cart_quantity_button">
                            <a class="cart_quantity_up" href="{{ route('reduce-products',$item['id']) }}"> - </a>
                            <input class="cart_quantity_input" type="text" name="quantity" value="{{ $item['quantity'] }}" autocomplete="off" size="2">
                            <a class="cart_quantity_down" href="{{ route('increase-products', $item['id']) }}"> + </a>
                          </div>
                        </td>
                        <td>{{ number_format($item['price']*$item['quantity']).'₫' }}</td>
                      </tr>
                      @endforeach
                      
                      </tbody>
                  </table>
                </div>
             </form>
             <!-- Cart Total view -->
             <div class="cart-view-total">
               <h4>Cart Totals</h4>
               <table class="aa-totals-table">
                 <tbody>
                   <tr>
                     <th>Subtotal</th>
                     <td>{{ number_format($total).'₫' }}</td>
                   </tr>
                   <tr>
                     <th>Total</th>
                     <td>{{ number_format($total).'₫' }}</td>
                   </tr>
                 </tbody>
               </table>
               <a href="{{ route('checkout') }}" class="aa-cart-view-btn">Proced to Checkout</a>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- / Cart view section -->

@stop