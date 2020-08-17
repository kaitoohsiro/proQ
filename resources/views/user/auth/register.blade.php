@extends('layouts.user.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form class="login-form" method="POST" action="{{ route('register') }}">
                        @csrf
                        <p class="login-text">
                            <span class="fa-stack fa-lg">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-lock fa-stack-1x"></i>
                            </span>
                        </p>
                        <div class="card-header">{{ __('Register') }}</div>
                        <input type="email" class="login-username @error('name') is-invalid @enderror" autofocus="true" required="true" placeholder="名前(表示名)" name="name" value="{{ old('name') }}" autocomplete="name" autofocus />
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <input type="text" class="login-username @error('email') is-invalid @enderror" autofocus="true" required="true" placeholder="Email" name="email" value="{{ old('email') }}" autocomplete="email" />
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <input type="password" class="login-password @error('password') is-invalid @enderror" required="true" placeholder="Password" name="password" autocomplete="new-password" />
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <input type="password" class="login-password" required="true" placeholder="Confirm Password" name="password_confirmation" autocomplete="new-password" />
                        <input type="submit" value="Register" class="login-submit" />
                    </form>
                    <div class="underlay-photo"></div>
                    <div class="underlay-black"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection