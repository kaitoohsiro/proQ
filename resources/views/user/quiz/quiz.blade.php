@include('user.components.head')
@include('user.components.header')


@section('content')
<form action="{{ route('quizFinish') }}" method="post">
    @csrf()
    @for ($i = 0; $i <= count($quizzes)-1; $i++) <div class="box123">
        <div class="line1">
            <input type="hidden" name="quiz{{ $i }}" value="{{ $quizzes[$i]['question'] }}">
            <input type="hidden" name="current{{ $i }}" value="{{ $quizzes[$i]['answer'] }}">
            <?= html_entity_decode($quizzes[$i]['question']); ?>
            </br>
            <input class="answer" name="answer{{ $i }}" type="text">
        </div>
        </div>

        @endfor
        <input type="hidden" name="count" value={{ count($quizzes) - 1 }}>
        <input class="answer_button" type="submit" value="回答する">
</form>
@endsection


<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @yield('head')
</head>

<body>
    @yield('header')
    @yield('content')
</body>

</html>