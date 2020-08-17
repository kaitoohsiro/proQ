@include('user.components.head')
@include('user.components.header')


@section('content')
@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif
<table>
    <thead>
        <tr>
            <td>問題</td>
            <th scope="col">答え</th>
            <th scope="col">正解</th>
            <th scope="col">判定</th>
        </tr>
    </thead>
    <tbody>
        @for ($i = 1; $i <= count($info)-1; $i++) <tr>
            <th data-label="問題" class="txt"><?= html_entity_decode($info[$i]["quiz"]); ?></th>
            <td data-label="答え" class="price">{{ $info[$i]["answer"] }}</td>
            <td data-label="正解" class="price">{{ $info[$i]["current"] }}</td>
            @if ($info[$i]["judgment"] == 1)
            <td data-label="判定" class="price current">○</td>
            @else ($info[$i]["judgment"] == 2)
            <td data-label="判定" class="price but">×</td>
            @endif
            </tr>
            @endfor
    </tbody>
</table>

<form class="form_position" method="post" action="{{ route('rankUpdate') }}">
    @csrf
    <a href="{{ route('top') }}">トップへ</a>
    <input type="hidden" name="resultScore" value="{{ $info[0]['resultScore'] }}">
    <input type="hidden" name="totalAnswer" value="{{ $info[0]['totalAnswer'] }}">
    <input type="submit" value="スコアを記録する">
</form>
@endsection


<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@if(app('env')=='local')
<link href="{{ asset('./css/user/result.css') }}" rel="stylesheet">
@endif
@if(app('env')=='production')
<link href="{{ secure_asset('./css/user/result.css') }}" rel="stylesheet">
@endif

<head>
    @yield('head')
</head>

<body>
    @yield('header')
    @yield('content')
</body>

</html>