@extends('layouts.master')
@section('title')QV_Watch|Product-Detail
@stop

@section('content')

<section id="aa-catg-head-banner">
    <img src="{{ asset('images/banner/banner4.jpg') }}" alt="fashion img">
    <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>Account Page</h2>
        <ol class="breadcrumb">
          <li><a href="{{ route('home') }}">Home</a></li>                   
          <li class="active">Account</li>
        </ol>
      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->
  
  <!-- Cart view section -->
  <section id="aa-myaccount">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-myaccount-area">         
            <div class="row">
              @if ( Session::has('error') )
                <div class="alert alert-danger alert-dismissible" role="alert">
                  <strong>{{ Session::get('error') }}</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                  </button>
                </div>
              @elseif (Session::has('status'))
                <div class="alert alert-danger alert-dismissible" role="alert">
                  <strong>{{ Session::get('status') }}</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                  </button>
                </div>
              @endif
              <div class="col-md-6">
                <div class="aa-myaccount-login">
                  <h4>Login</h4>
                  <form method="POST" action="{{ route('login') }}" class="aa-login-form">
                    @csrf
                    <label for="email">Email address<span>*</span></label>
                    <input type="text" placeholder="Email" name="email" id="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" required autofocus>
                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span><br>
                    @endif
                    <label for="password">Password<span>*</span></label>
                    <input type="password" placeholder="Password" name="password" id="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" required>
                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                    <button type="submit" class="aa-browse-btn">Login </button>
                    <label class="rememberme" for="rememberme"><input type="checkbox" id="rememberme" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember me </label>
                    @if (Route::has('password.request'))
                    <p class="aa-lost-password"><a href="#">Lost your password?</a></p>
                    @endif
                  </form>
                </div>
              </div>
              <div class="col-md-6">
                <div class="aa-myaccount-register">                 
                  <h4>Register</h4>
                    <form method="POST" action="{{ route('register') }}" class="aa-login-form">
                      @csrf
                      <label for="name">Name<span>*</span></label>
                      <input type="text" placeholder="Name" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" required autofocus>
                      @if ($errors->has('name'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('name') }}</strong>
                          </span>
                      @endif
                      <label for="">Email address<span>*</span></label>
                      <input type="text" placeholder="Email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" required>
                      @if ($errors->has('email'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('email') }}</strong>
                          </span>
                      @endif
                      <label for="">Password<span>*</span></label>
                      <input type="password" placeholder="Password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" required="required">
                      @if ($errors->has('password'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('password') }}</strong>
                          </span>
                      @endif
                      <label for="">Confirm Password<span>*</span></label>
                      <input type="password" placeholder="Confirm Password" name="password_confirmation" required><br>

                      <button type="submit" class="aa-browse-btn">Register</button>                    
                    </form>
                </div>
              </div>
            </div>          
          </div>
        </div>
      </div>
    </div>
  </section>

@stop