@include('user.components.head')
@include('user.components.header')


@section('content')
<main>
    <div class="rank">
        <h2><i class="fas fa-crown"></i> ランキング</h2>
    </div>
    <table>
        <tr>
            <th>順位</th>
            <th>ユーザー名</th>
            <th>得点数</th>
        </tr>
        @foreach ($userRankInfo as $userRank)
        <tr>
            <td>{{ $userRank['totalRank'] }}</td>
            <td>{{ $userRank['userName'] }}</td>
            <td>{{ $userRank['totalScore'] }}</td>
        </tr>
        @endforeach
    </table>
</main>
@endsection


<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @yield('head')
    @if(app('env')=='local')
    <link href="{{ asset('./css/user/rank.css') }}" rel="stylesheet">
    @endif
    @if(app('env')=='production')
    <link href="{{ secure_asset('./css/user/rank.css') }}" rel="stylesheet">
    @endif
</head>

<body>
    @yield('header')
    @yield('content')
</body>

</html>