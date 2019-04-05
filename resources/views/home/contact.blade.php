@extends('layouts.master')
@section('title')QV_Watch|Contact
@stop

@section('content')

<!-- catg header banner section -->
  <section id="aa-catg-head-banner">
    <img src="{{ asset('images/banner/banner4.jpg') }}" alt="fashion img">
      <div class="aa-catg-head-banner-area">
        <div class="container">
          <div class="aa-catg-head-banner-content">
            <h2>Contact</h2>
            <ol class="breadcrumb">
              <li><a href="{{ route('home') }}">Home</a></li>         
              <li class="active">Contact</li>
            </ol>
          </div>
        </div>
      </div>
  </section>
  <!-- / catg header banner section -->
  <!-- start contact section -->
  <section id="aa-contact">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-contact-area">
            <div class="aa-contact-top">
              <h2>We are wating to assist you..</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi, quos.</p>
            </div>
            <!-- contact map -->
            <div class="aa-contact-map">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3902.3714257064535!2d-86.7550931378034!3d34.66757706940219!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8862656f8475892d%3A0xf3b1aee5313c9d4d!2sHuntsville%2C+AL+35813%2C+USA!5e0!3m2!1sen!2sbd!4v1445253385137" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
            <!-- Contact address -->
            <div class="aa-contact-address">
              <div class="row">
                <div class="col-md-8">
                  <div class="aa-contact-address-left">
                    @if(count($errors) > 0)
                    <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{!! $error !!}</li>
                          @endforeach
                      </ul>
                    </div>
                    @endif
                    @if (Session()->has('flash_level'))
                    <div class="alert alert-success">
                      <ul>
                          {!! Session::get('flash_massage') !!}
                      </ul>
                    </div>
                    @endif
                    <form class="comments-form contact-form" method="POST" action="{{ route('send-email') }}">
                      @csrf
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">                        
                            <input type="text" placeholder="Your Name" name="name" value="{{old('name')}} " class="form-control">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">                        
                            <input type="email" placeholder="Email" name="email" value="{{old('email')}}" class="form-control">
                          </div>
                        </div>
                      </div>     
                      <div class="form-group">                        
                        <textarea class="form-control" rows="3" placeholder="Message" value="{{old('content')}}"
                         name="content"></textarea>
                      </div>
                      <button class="aa-secondary-btn">Send</button>
                    </form>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="aa-contact-address-right">
                    <address>
                      <h4>QV_Watch</h4>
                      <p>Shop đồng hồ chính hãng.</p>
                      <p><span class="fa fa-home"></span>Hòa Hải, Ngũ Hành Sơn, Đà Nẵng</p>
                      <p><span class="fa fa-phone"></span>+ 033-6017-808</p>
                      <p><span class="fa fa-envelope"></span>Email: qvwatch@gmail.com</p>
                    </address>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@stop