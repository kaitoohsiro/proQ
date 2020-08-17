@section('head')
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Fonts -->
<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
<link href="https://use.fontawesome.com/releases/v5.12.0/css/all.css" rel="stylesheet">


<!-- style -->
@if(app('env')=='local')
<link href="{{ asset('./css/user/user.css') }}" rel="stylesheet">
<link href="{{ asset('./css/user/quiz.css') }}" rel="stylesheet">
<link href="{{ asset('./css/user/header.css') }}" rel="stylesheet">
@endif
@if(app('env')=='production')
<link href="{{ secure_asset('./css/user/user.css') }}" rel="stylesheet">
<link href="{{ secure_asset('./css/user/quiz.css') }}" rel="stylesheet">
<link href="{{ asset('./css/user/header.css') }}" rel="stylesheet">
@endif

<title>proQ</title>
@endsection