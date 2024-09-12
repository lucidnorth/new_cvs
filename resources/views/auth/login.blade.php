@extends('layouts.auth')

@section('content')

<div class="container login-bg">
    <div class="row">
        <div class="col-lg-9 mx-auto py-5">
            <div class="login-card">
                <div class="row">
                    <div class="col-lg-6 images my-auto left-side">
                        <div class="logo">
                            <a href="{{route('homepage')}}">
                                <img src="{{ asset('images/logo.png') }}" alt="CertVerification.com">
                            </a>
                        </div>
                        <div class="other">
                            <img src="{{ asset('images/login-image.jpeg') }}" alt="image.jpeg">
                        </div>
                    </div>
                    <div class="col-lg-6 ">
                        <div class="form">
                            <div class="logo">
                                <a href="{{route('homepage')}}">
                                    <img src="{{ asset('images/logo.png') }}" alt="CertVerification.com">
                                </a>
                            </div>
                            <h5 class="welcome">Welcome Back</h5>
                            <h4 class="signin">Sign In</h4>
                            @if(session('message'))
                            <p class="alert alert-info">
                                {{ session('message') }}
                            </p>
                            @endif
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} mb-2">
                                    <label for="email-input">Email</label>
                                    <!-- <input type="email" class="form-control" id="username-input" placeholder="Enter email" required> -->
                                    <input id="email" type="email" name="email" class="form-control" required autocomplete="email" autofocus placeholder="{{ trans('global.login_email') }}" value="{{ old('email', null) }}">
                                    @if($errors->has('email'))
                                    <p class="help-block">
                                        {{ $errors->first('email') }}
                                    </p>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} mb-2">
                                    <label for="password-input">Password</label>
                                    <!-- <input type="password" class="form-control" id="password-input" placeholder="Enter Password" required> -->
                                    <input id="password" type="password" name="password" class="form-control" required placeholder="{{ trans('global.login_password') }}">
                                    @if($errors->has('password'))
                                    <p class="help-block">
                                        {{ $errors->first('password') }}
                                    </p>
                                    @endif
                                </div>
                                <div class="checkbox icheck mb-2">
                                    <label><input type="checkbox" name="remember"> {{ trans('global.remember_me') }}</label>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary w-100">Login</button>
                                </div>
                            </form>
                            <div class="option mt-2">
                                <i>@if(Route::has('password.request'))<a href="{{ route('password.request') }}">Forgot Password?</a> @endif</i>
                                <i class="signup"><a href="{{ route('registrationpage') }}">Sign up Here</a></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    $(function() {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' /* optional */
        });
    });
</script>
@endsection