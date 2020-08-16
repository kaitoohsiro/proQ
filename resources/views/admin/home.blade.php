@extends('layouts.admin.app')

@section('content')
@if(app('env')=='local')
<link href="{{ asset('./css/admin/show.css') }}" rel="stylesheet">
@endif
@if(app('env')=='production')
<link href="{{ secure_asset('./css/admin/show.css') }}" rel="stylesheet">
@endif
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">問題一覧</div>
                <div class="">
                    <a href="new">新規登録</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif


                    <table>
                        <thead>
                            <tr>
                                <td>No.</td>
                                <th scope="col">問題</th>
                                <th scope="col">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($quizzes as $quiz)
                            <tr>
                                <th>{{ $quiz['id'] }}</th>
                                <td data-label="問題" class="txt"><?= html_entity_decode($quiz['question']); ?></td>
                                <td data-label="操作" class="price"><a href="edit/{{ $quiz['id'] }}">編集</a>/<a href="delete/{{ $quiz['id'] }}">削除</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection