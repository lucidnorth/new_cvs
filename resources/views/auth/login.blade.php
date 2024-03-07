@extends('layouts.auth')
@section('content')

<div class="container-fluid h-100 bg-gradient">
            <div class="row h-100">
                <div class="col-md- col-lg-8 mx-auto my-auto inner-div">


                    <div class="image">
                    <a href="{{route('homepage')}}">  <div class="logo"><img src="{{ asset('images/logo.png') }}" alt="CertVerification.com"></div></a>

                        <img src="{{ asset('images/login-image.jpeg') }}"
                            alt="image.jpeg">
                          <br><br><br>
                            <i class="image-info">
                                    </i>
                    </div>


                    <div class="vertical-divider"></div>
                    <div class="form-div">
                        <h3 class="welcome">Welcome Back</h3>
                        @if(session('message'))
            <p class="alert alert-info">
                {{ session('message') }}
              </p>
             @endif
                     <form method="POST" action="{{ route('login') }}">

                   @csrf
                            <h3 class="signin">Sign in</h3>
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email-input">Email</label>
                                <!-- <input type="email" class="form-control" id="username-input" placeholder="Enter email" required> -->
                                <input id="email" type="email" name="email" class="form-control" required autocomplete="email" autofocus placeholder="{{ trans('global.login_email') }}" value="{{ old('email', null) }}">
                                @if($errors->has('email'))
                    <p class="help-block">
                        {{ $errors->first('email') }}
                    </p>
                @endif
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password-input">Password</label>
                                <!-- <input type="password" class="form-control" id="password-input" placeholder="Enter Password" required> -->
                                <input id="password" type="password" name="password" class="form-control" required placeholder="{{ trans('global.login_password') }}">
                                @if($errors->has('password'))
                    <p class="help-block">
                        {{ $errors->first('password') }}
                    </p>
                @endif
                            </div>
                            <div class="checkbox icheck">
                        <label><input type="checkbox" name="remember"> {{ trans('global.remember_me') }}</label>
                    </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary w-100">Login</button>
                            </div>
                          
                        </form>
                        <div class="form-group mt-3">
                                <button type="submit" class="btn btn-secondary w-100">
                                    <img src="{{ asset('images/googlelogo.png') }}"alt="" class="google">
                                    Login with Google
                                </button>
                            </div>
                        <i>@if(Route::has('password.request'))<a href="{{ route('password.request') }}">Forgot Password?</a> @endif<i class="signup"><a href="{{ route('register') }}">Sign up Here</a></i></i>
                    </div>



<!-- 
<div class="login-box">
    <div class="login-logo">
        <a href="{{ route('admin.home') }}">
            {{ trans('panel.site_title') }}
        </a>
    </div>
    <div class="login-box-body">
        <p class="login-box-msg">
            {{ trans('global.login') }}
        </p>

        @if(session('message'))
            <p class="alert alert-info">
                {{ session('message') }}
            </p>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <input id="email" type="email" name="email" class="form-control" required autocomplete="email" autofocus placeholder="{{ trans('global.login_email') }}" value="{{ old('email', null) }}">

                @if($errors->has('email'))
                    <p class="help-block">
                        {{ $errors->first('email') }}
                    </p>
                @endif
            </div>
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <input id="password" type="password" name="password" class="form-control" required placeholder="{{ trans('global.login_password') }}">

                @if($errors->has('password'))
                    <p class="help-block">
                        {{ $errors->first('password') }}
                    </p>
                @endif
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label><input type="checkbox" name="remember"> {{ trans('global.remember_me') }}</label>
                    </div>
                </div>
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">
                        {{ trans('global.login') }}
                    </button>
                </div>
            </div>
        </form>

        @if(Route::has('password.request'))
            <a href="{{ route('password.request') }}">
                {{ trans('global.forgot_password') }}
            </a><br>
        @endif

        <a href="{{ route('register') }}">{{ trans('global.register') }}</a>
    </div>
</div> -->
@endsection

@section('scripts')
<script>
    $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
@endsection