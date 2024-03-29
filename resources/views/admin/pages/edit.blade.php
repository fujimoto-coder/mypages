@extends('layouts.admin')
@section('title', '投稿の編集')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>投稿編集</h2>
                <form action="{{ route('admin.pages.update') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2" for="title">タイトル</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="title" value="{{ $pages_form->title }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="body">本文</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="body" rows="20">{{ $pages_form->body }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">ジャンル選択</label>
                        <div class="col-md-10">
                            <select name='genre'>
                                <option value="music" @if($pages_form->genre=="music") selected @endif>音楽</option>
                                <option value="artist" @if($pages_form->genre=="artist") selected @endif>アーティスト</option>
                                <option value="live" @if($pages_form->genre=="live") selected @endif>ライブ/コンサート</option>
                                <option value="lesson" @if($pages_form->genre=="lesson") selected @endif>レッスン</option>
                                <option value="instrument" @if($pages_form->genre=="instrument") selected @endif>楽器</option>
                                <option value="bar" @if($pages_form->genre=="bar") selected @endif>ミュージックバー/レストラン</option>
                                 <option value="operation" @if($pages_form->genre=="operation") selected @endif>運営</option>
                            </select>
                        </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="image">画像</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                            <div class="form-text text-info">
                                設定中: {{ $pages_form->image_path }}
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="remove" value="true">画像を削除
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="hidden" name="id" value="{{ $pages_form->id }}">
                            @csrf
                            <input type="submit" class="btn btn-primary" value="更新">
                        </div>
                    </div>
                </form>
                 {{-- 以下を追記 --}}
                <div class="row mt-5">
                    <div class="col-md-4 mx-auto">
                        <h2>編集履歴</h2>
                        <ul class="list-group">
                            @if ($pages_form->histories != NULL)
                                @foreach ($pages_form->histories as $history)
                                    <li class="list-group-item">{{ $history->edited_at }}</li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
                {{-- 以上を追記 --}}
            </div>
        </div>
    </div>
@endsection