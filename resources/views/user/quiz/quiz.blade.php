@include('user.components.head')
@include('user.components.header')


@section('content')

@foreach ($quizzes as $quiz)
{{ $quiz['question'] }}
@endforeach
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