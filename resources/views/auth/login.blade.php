@extends('layouts.app')

@section('content')
    <div class="limiter">
        <div class="container-login100" style="background-image: url('img/login-bg.jpeg');">
            <div class="wrap-login100 p-t-30 p-b-50">
            <span class="login100-form-title p-b-41">
                Login
            </span>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="wrap-input100 validate-input" data-validate="Enter username">
                        <input class="input100" id="email" type="email" name="email" value="{{ old('email') }}"
                               placeholder="User name" required autofocus>
                        <span class="focus-input100" data-placeholder="&#xe82a;"></span>
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="wrap-input100 validate-input" data-validate="Enter password">
                        <input class="input100" id="password" type="password" name="password" placeholder="Password"
                               required>
                        <span class="focus-input100" data-placeholder="&#xe80f;"></span>
                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="container-login100-form-btn m-t-32">
                        <button type="submit" class="login100-form-btn">
                            Login
                        </button>
                    </div>
                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                </form>
            </div>
        </div>
    </div>


@endsection
