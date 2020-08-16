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

                    <header>クイズ作成編集</header>
                    <form id="form" class="topBefore" method="post" action="{{ route('admin.quizUpdate') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name='id' value="{{ $quizzes['id'] }}">
                        <input id="answer" name="answer" type="text" value="{{ $quizzes['answer'] }}" placeholder="回答を埋めてね！">
                        <textarea id="question" name="question" type="text">{{ $quizzes['question'] }}</textarea>

                        <input id="submit" type="submit" value="GO!">

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection