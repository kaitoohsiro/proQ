@extends('layouts.admin.app')

@section('content')
@if(app('env')=='local')
<link href="{{ asset('./css/admin/new.css') }}" rel="stylesheet">
@endif
@if(app('env')=='production')
<link href="{{ secure_asset('./css/admin/new.css') }}" rel="stylesheet">
@endif
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <header>クイズ作成画面</header>

                    <form id="form" class="topBefore" method="post" action="{{ route('admin.quizCreate') }}">
                        {{ csrf_field() }}
                        <textarea id="question" name="question" type="text" placeholder="question"></textarea>
                        <input id="answer" name="answer" type="text" placeholder="answer">

                        <input id="submit" type="submit" value="GO!">

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection