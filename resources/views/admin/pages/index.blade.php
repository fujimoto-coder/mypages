@extends('layouts.admin')
@section('title', '投稿済みニュースの一覧')

@section('content')
    <div class="container">
        <div class="row">
            <h2>投稿一覧</h2>
            <a href="https://mypages.mydns.jp/">TOP</a>
        </div>
        <div class="row">
            <div class="col-md-4">
                <a href="{{ route('admin.pages.add') }}" role="button" class="btn btn-primary">新規作成</a>
            </div>
            <div class="col-md-8">
                <form action="{{ route('admin.pages.index') }}" method="get">
                    <div class="form-group row">
                        <label class="col-md-2">タイトル</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="cond_title" value="{{ $cond_title }}">
                        </div>
                        <div class="col-md-2">
                            @csrf
                            <input type="submit" class="btn btn-primary" value="検索">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="list-pages col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th width="10%">ID</th>
                                <th width="20%">タイトル</th>
                                <th width="50%">本文</th>
                                <th width="10%">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $pages)
                                <tr>
                                    <th>{{ $pages->id }}</th>
                                    <td>{{ Str::limit($pages->title, 100) }}</td>
                                    <td>{{ Str::limit($pages->body, 250) }}</td>
                                    <td>
                                        <div>
                                            <a href="{{ route('admin.pages.edit', ['id' => $pages->id]) }}">編集</a>
                                        </div>
                                        <div>
                                            <a href="{{ route('admin.pages.delete', ['id' => $pages->id]) }}">削除</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection