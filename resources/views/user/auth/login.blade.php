@extends('layouts.user.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form class="login-form" method="POST" action="{{ route('login') }}">
                        @csrf
                        <p class="login-text">
                            <span class="fa-stack fa-lg">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-lock fa-stack-1x"></i>
                            </span>
                        </p>
                        <div class="card-header-tag">
                            <div class="card-header">{{ __('Login') }}</div>
                        </div>
                        <input type="email" class="login-username @error('email') is-invalid @enderror" autofocus="true" required="true" placeholder="Email" name="email" value="{{ old('email') }}" autocomplete="email" autofocus />
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <input type="password" class="login-password @error('password') is-invalid @enderror" required="true" placeholder="Password" name="password" autocomplete="current-password" />
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                        <input type="submit" value="Login" class="login-submit" />
                    </form>
                    <div class="underlay-photo"></div>
                    <div class="underlay-black"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection