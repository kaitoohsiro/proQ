@include('user.components.head')
@include('user.components.header')


@section('content')
@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif
<div class="card">
    <div class="card_content">
        <table>
            <thead>
                <tr>
                    <td></td>
                    <td>前</td>
                    <td></td>
                    <td>後</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>ランキング</td>
                    <td>{{ $userInfos['updateRank'] }}</td>
                    <td>-></td>
                    <td>{{ $userInfos['updatedRank'] }}</td>
                </tr>
                <tr>
                    <td>スコア</td>
                    <td>{{ $userInfos["updateScore"] }}</td>
                    <td>-></td>
                    <td>{{ $userInfos["updatedScore"] }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <a href="{{ route('top') }}">top</a>
    <a href="{{ route('rank') }}">ランキング表</a>
    <a href="{{ route('home') }}">マイページ</a>
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