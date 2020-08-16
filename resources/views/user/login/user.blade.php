@extends('layouts.user.app')

@section('content')
<link href="{{ mix('./css/user/loginUser.css') }}" rel="stylesheet">


@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif


<div class="content">
    <div class="intro">
        <h2>ようこそ!</h2>
        <h1>{{ $userInfo['name'] }}</h1>
        <h3>ランキング</h3>
        <h4>{{ $userInfo['totalRank'] }}位</h4>
        <p>
            先週までのランキング {{ $userInfo['lastRank'] }}位
        </p>
        <h3>総回答数</h3>
        <h4>{{ $userInfo['totalAnswer'] }}</h4>
        <h3>総得点</h3>
        <h4>{{ $userInfo['totalScore'] }}</h4>
        <i class="fas fa-broom"></i>
    </div>
    <div class="image"></div>
    <nav>
        <a href="/">トップへ</a>
        <a href="/rank">ランキング表</a>
        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
            {{ __('ログアウト') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </nav>
</div>
<div class="circle circle01">
    <div class="circle orbiting-circle01"></div>
</div>

<div class="circle orbitPathCentered border-blue orbitPath01-border"></div>
<div class="circle orbitPathCentered orbitPath01"></div>

<div class="circle orbitPathCentered border-blue orbitPath02-border"></div>
<div class="circle orbitPathCentered orbitPath02"></div>
<div class="circle circle02"></div>

<div class="circle border-orange circle03"></div>
<div class="circle circle04"></div>


@endsection