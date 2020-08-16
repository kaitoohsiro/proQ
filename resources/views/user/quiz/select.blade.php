@include('user.components.head')
@include('user.components.header')


@section('content')
@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif
<div class="select">
    <div class="catch">
        SELECT
    </div>
    <div class="box25">
        <p>問題数を設定してください。</p>
        <form id="select" action="/quiz" method="get">
            <div class="cp_ipselect">
                <select class="cp_sl06" name="number" required>
                    <option value="" hidden disabled selected></option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                </select>
                <span class="cp_sl06_highlight"></span>
                <span class="cp_sl06_selectbar"></span>
                <label class="cp_sl06_selectlabel">Choose</label>
            </div>
            <div class="hero-cta"><a class="button button-t" href="/">トップへ</a><input type="submit" class="button button-s" value="スタート"></div>
        </form>
    </div>
</div>
@endsection


<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @yield('head')
    @if(app('env')=='local')
    <link rel="stylesheet" href="{{ asset('./css/user/select.css') }}">
    @endif
    @if(app('env')=='production')
    <link href="{{ secure_asset('./css/user/select.css') }}" rel="stylesheet">
    @endif
</head>

<body>
    @yield('header')
    @yield('content')
</body>

</html>